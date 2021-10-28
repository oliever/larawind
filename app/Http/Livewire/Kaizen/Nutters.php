<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;
use App\Models\Kaizen;
use App\Models\Location;
use App\Models\User;
use App\Models\RefAffectedArea;
use DateTime;
use Carbon\Carbon;
use Laravel\Jetstream\Jetstream;

class Nutters extends Component
{
    public $kaizen;
    public $stores;
    public $affectedAreas;
    public $isRapid = false;
    public $isJustDoIt = true;
    public $hasBeforeAfter = false;
    public $selectedAfftectedAreas = [];
    public $shown = false;

    public $dateAssigned;

    public $isSearchUserModalOpen = false;
    public $isSearchLocationModalOpen = false;
    public $selectedUsers = [];
    public $selectedLocations = [];

    protected $listeners = ['userSelected','locationSelected','usersCheckboxUpdated'];

    protected $rules = [
        'kaizen.name' => 'required|min:5',
        'kaizen.date_assigned' => '',
        'kaizen.all_locations' => '',
        'kaizen.other_affected_area' => '',
        'kaizen.reason' => '',
        'kaizen.problem' => '',
        'kaizen.completion' => '',
        'kaizen.rapid' => '',
        'kaizen.just_do_it' => '',
        'kaizen.head_office_input' => '',
        'kaizen.head_office_comment' => '',
        'kaizen.dollar_value' => '',//HO user only
        'kaizen.savings' => '',//HO user only
        'kaizen.hours_saved' => '',//HO user only
        'kaizen.causes' => '',
        'kaizen.handled_at_location' => '',
        'kaizen.solution' => '',
        'kaizen.expected_result' => '',
        'kaizen.comments_before' => '',
        'kaizen.comments_after' => '',
        'kaizen.benefits' => '',
        'kaizen.rapid_problem' => '',

        'kaizen.validating_user_id' => '',
        'kaizen.approving_user_id' => '',

    ];

    public function usersCheckboxUpdated($selectedUsers)
    {
        info('usersCheckboxUpdated');
        info($selectedUsers);
    }


    public function userSelected($userId)
    {
        info('adding user ' . $userId);
        $this->selectedUsers[] = User::where(['id' => $userId])->first();
        $this->isSearchUserModalOpen = false;
    }

    public function locationSelected($locationId)
    {
        info('adding location ' . $locationId);
        $this->selectedLocations[] = Location::where(['id' => $locationId])->first();
        $this->isSearchLocationModalOpen = false;
    }

    public function removeSelectedUser($index)
    {
        info('removing user: index ' . $index);
        unset($this->selectedUsers[$index]);
    }

    public function removeSelectedLocation($index)
    {
        info('removing Location: index ' . $index);
        unset($this->selectedLocations[$index]);
    }

    public function mount(Kaizen $kaizen = null)
    {
        //info(Jetstream::$roles);

        $this->kaizen = $kaizen;

        $this->selectedUsers[] =  new User();
        $this->selectedLocations[] =  new Location();

        if(!isset($this->kaizen['id'])){
            $this->kaizen = new Kaizen();
            $this->isJustDoIt = true;
            $this->isRapid = false;
            $this->kaizen->rapid = false;

            $this->kaizen->just_do_it = true;
            $this->kaizen->head_office_input = false;
            $this->kaizen->handled_at_location = false;
            $this->hasBeforeAfter = false;


        }
        else{
            //info(date('Y-m-d', strtotime($this->kaizen->date_assigned)));
            $this->dateAssigned = date('Y-m-d', strtotime($this->kaizen->date_assigned));
            $this->isJustDoIt = $this->kaizen->just_do_it;
            $this->isRapid = $this->kaizen->rapid;
            $this->hasBeforeAfter = $this->kaizen->before_after;
            foreach(explode(",", $kaizen->affected_areas) as $key=>$value){
                //replace keys (index) with values from db
                $this->selectedAfftectedAreas[$value] = $value;
            }
            foreach(explode(",", $kaizen->members) as $key=>$value){
                //replace keys (index) with values from db
                $this->selectedUsers[] = User::where(['id' => $value])->first() ;
            }

            foreach ($this->kaizen->locations()->get() as $key => $value) {
                $this->selectedLocations[] = $value;
            }
        }
    }

    public function openSearchUserModal(){

        $this->isSearchUserModalOpen = true;
    }

    public function openSearchLocationModal(){

        $this->isSearchLocationModalOpen = true;
    }

    public function closeSearchUserModal(){
        info('closing user search...');
        $this->isSearchUserModalOpen = false;
        $this->emit('searchUserModalClosed');//to display action message
    }

    public function closeSearchLocationModal(){
        $this->isSearchLocationModalOpen = false;
        $this->emit('searchLocationModalClosed');//to display action message
    }

    public function saveAsDraft(){
        $this->save();
    }

    public function submitKaizen(){
        $this->save(true);
    }

    private function save($asProject = false)
    {
        $this->kaizen->rapid = $this->isRapid;
        $this->kaizen->just_do_it = $this->isJustDoIt;
        $this->kaizen->team_id = auth()->user()->currentTeam->id;
        $this->kaizen->user_id =  auth()->user()->id;
        $this->kaizen->members = implode(', ', array_map(function ($entry) {
            if($entry)
                if(isset($entry['id']))
                    return $entry['id'];
          }, $this->selectedUsers));

        $this->kaizen->head_office_input = $this->kaizen->head_office_input ? true : false;
        $this->kaizen->handled_at_location = $this->kaizen->handled_at_location ? true : false;
        $this->kaizen->before_after = $this->hasBeforeAfter;

        $this->kaizen->date_assigned = date('Y-m-d', strtotime($this->dateAssigned));

        //info($this->selectedAfftectedAreas);
        $this->kaizen->affected_areas = implode(',', array_keys(array_filter($this->selectedAfftectedAreas)));
        //info($this->kaizen->affected_areas);
        if(!$this->kaizen->all_locations)
            $this->kaizen->all_locations = 0;

        if(!$this->kaizen->completion)
            $this->kaizen->completion = 0;

        $this->validate();

        // Execution doesn't reach here if validation fails.

        if($asProject)
            $this->kaizen->posted =Carbon::now();

        $this->kaizen->save();

       // $this->saveLocations();

        info('nutters kaizen saved');
        info($this->kaizen);

        $this->emit('saved');//to display action message
        $this->emit('kaizenAdded', $this->kaizen->id);

        $message = 'Kaizen Form saved as draft: ' . $this->kaizen->id;
        if($this->kaizen->posted)
            $message = 'Kaizen Form saved as Project: ' . $this->kaizen->id;
       session()->flash('message', $message);
       //return redirect()->to('/kaizen/' . $this->kaizen->id);
    }

    private function formatCleave(){
        $this->kaizen->dollar_value = trim(str_replace("$", "", $this->kaizen->dollar_value)) == '' ? null : trim(str_replace("$", "", $this->kaizen->dollar_value));
        $this->kaizen->savings = trim(str_replace("$", "", $this->kaizen->savings)) == '' ? null : trim(str_replace("$", "", $this->kaizen->savings));
    }

    private function saveLocations(){
        //$this->kaizen->locations = [];
        info( 'saving locations...');

        $locations = [];
        foreach ($this->selectedLocations as $key => $location) {
            info($location);
            if(!empty($location))
                array_push($locations, $location['id']);

        }
        $this->kaizen->locations()->sync($locations);
        $this->kaizen->save();
        info( $this->kaizen->locations);
    }

    public function createBeforeAfter()
    {
        $this->hasBeforeAfter = true;
        $this->kaizen->before_after = $this->hasBeforeAfter;
        $this->kaizen->save();
    }
    public function render()
    {
        $this->stores = $this->getStores();
        $this->affectedAreas = $this->getAffectedAreas();


        return view('livewire.kaizen.nutters');
    }

    private function getStores()
    {
        return Location::get()->sortBy('name');
    }

    private function getAffectedAreas(){
        return RefAffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->get();

    }

}
