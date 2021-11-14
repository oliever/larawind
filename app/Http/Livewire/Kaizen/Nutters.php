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
    public $employee;
    public $kaizen;
    //public $stores;
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
    public $members = [];
    public $selectedLocations = [];

    protected $listeners = ['employeesCheckboxUpdated', 'locationsCheckboxUpdated'];

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

    public function mount($employee = null, Kaizen $kaizen = null)
    {
        if(auth()->user()->shared)
            $this->employee = $employee;
        info($this->employee);

        $this->kaizen = $kaizen;
        info("--Nutters::mount kaizen-- " . $this->kaizen->id);

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
            if($this->kaizen->date_assigned)
                $this->dateAssigned = date('Y-m-d', strtotime($this->kaizen->date_assigned));
            $this->isJustDoIt = $this->kaizen->just_do_it;
            $this->isRapid = $this->kaizen->rapid;
            $this->hasBeforeAfter = $this->kaizen->before_after;
            foreach(explode(",", $kaizen->affected_areas) as $key=>$value){
                //replace keys (index) with values from db
                $this->selectedAfftectedAreas[$value] = $value;
            }

            $this->selectedLocations = $this->kaizen->locations()->get();
            //$this->selectedUsers = $this->kaizen->users()->get();
            $this->members = $this->kaizen->members()->get();
        }
    }

    public function locationsCheckboxUpdated($locations){
        $this->selectedLocations = $locations;
    }
    public function employeesCheckboxUpdated($members){
        $this->members = $members;
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
        if(auth()->user()->shared){
            $this->kaizen->employee_id = $this->employee->id;
        }

        $this->kaizen->head_office_input = $this->kaizen->head_office_input ? true : false;
        $this->kaizen->handled_at_location = $this->kaizen->handled_at_location ? true : false;
        $this->kaizen->before_after = $this->hasBeforeAfter;

        if($this->dateAssigned)
            $this->kaizen->date_assigned = date('Y-m-d', strtotime($this->dateAssigned));

        //info($this->selectedAfftectedAreas);
        $this->kaizen->affected_areas = implode(',', array_keys(array_filter($this->selectedAfftectedAreas)));
        //info($this->kaizen->affected_areas);
       /*  if(!$this->kaizen->all_locations)
            $this->kaizen->all_locations = 0; */

        if(!$this->kaizen->completion)
            $this->kaizen->completion = 0;

        $this->validate();

        // Execution doesn't reach here if validation fails.



        if($asProject)
            $this->kaizen->posted =Carbon::now();

        if(count($this->selectedLocations) == count(Location::where('area_id', null)->with('children')->get()[0]->children))
            $this->kaizen->all_locations = 1;
        else
            $this->kaizen->all_locations = 0;

        $this->kaizen->save();

        $this->kaizen->locations()->sync($this->selectedLocations);
        $this->kaizen->members()->sync($this->members);
       // $this->saveLocations();

        info('---nutters_kaizen_saved---');
        info($this->kaizen);

        session()->flash('success', ['title'=>'Kaizen Suggestion Form Saved!' , 'subtitle'=>'ID: '. str_pad($this->kaizen->id, 4,"0", STR_PAD_LEFT)]);

        $this->emit('saved');//to display action message
        $this->emit('kaizenAdded', $this->kaizen->id);//Listeners: 1. UploadPhotos

        /* $message = 'Kaizen Form saved as draft: ' . $this->kaizen->id;
        if($this->kaizen->posted)
            $message = 'Kaizen Form saved as Project: ' . $this->kaizen->id; */

       //return redirect()->to('/kaizen/' . $this->kaizen->id);
    }

    /* private function formatCleave(){
        $this->kaizen->dollar_value = trim(str_replace("$", "", $this->kaizen->dollar_value)) == '' ? null : trim(str_replace("$", "", $this->kaizen->dollar_value));
        $this->kaizen->savings = trim(str_replace("$", "", $this->kaizen->savings)) == '' ? null : trim(str_replace("$", "", $this->kaizen->savings));
    } */

    private function saveLocations(){
        //$this->kaizen->locations = [];
        info( 'saving locations...');

        $locations = [];
        foreach ($this->selectedLocations as $key => $location) {
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
        //$this->stores = $this->getStores();
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
