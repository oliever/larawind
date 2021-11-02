<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\Location;
use App\Models\RefAffectedArea;
use App\Models\User;
use DateTime;
use Carbon\Carbon;


class Nutters extends Component
{
    public $project;
    public $stores;
    public $users;
    public $affectedAreas;
    public $selectedAfftectedAreas = [];
    public $term;
    public $usersResults = [];

    public $isSearchUserModalOpen = false;
    public $searchType;/* manager, sponsor, champion, ap_manager, ap_sponsor, ap_champion, hours_actual_validator, savings_actual_validator*/

    /* public $selectedManagers = [];
    public $selectedSponsors = [];
    public $selectedChampions = [];
    public $selectedApManagers = [];
    public $selectedApSponsors = [];
    public $selectedApChampions = [];
    public $selectedHoursActualValidators = [];
    public $selectedSavingsActualValidators = []; */

    public $isSearchLocationModalOpen = false;
    public $selectedLocations = [];

    /* public $hasManager;
    public $hasSponsor;
    public $hasChampion;
    public $hasApManager;
    public $hasApSponsor;
    public $hasApChampion;
    public $hasHoursActualValidator;
    public $hasSavingsActualValidator; */

    /* protected $listeners = ['userSelected','locationSelected']; */
    protected $listeners = ['locationsCheckboxUpdated'];

    protected $rules = [
        'project.description' => 'required|min:5',
        'project.capex' => '',
        'project.manager_id' => '',
        'project.sponsor_id' => '',
        'project.champion_id' => '',
        'project.primary_team' => '',
        'project.all_locations' => '',
        'project.equicapita_support' => '',
        'project.loss' => '',
        'project.budget' => '',
        'project.hours' => '',
        'project.savings' => '',
        'project.start' => '',
        'project.end' => '',
        'project.status' => '',
        'project.completion' => '',
        'project.other_affected_area' => '',
        'project.metric' => '',
        'project.deliverables' => '',
        'project.scope' => '',
        'project.risks' => '',
        'project.comments' => '',
        'project.approved_manager_id' => '',
        'project.approved_sponsor_id' => '',
        'project.approved_champion_id' => '',
        'project.hours_actual' => '',
        'project.hours_actual_validated_id' => '',
        'project.savings_actual' => '',
        'project.savings_actual_validated_id' => '',
    ];

    public function mount(Project $project = null)
    {
        $this->users = auth()->user()->currentTeam->allUsers();
        $this->project = $project;
        //$this->selectedAfftectedAreas = explode(",", $kaizen->affected_areas);

        //$this->selectedLocations[] =  new Location();

       if(!isset($this->project['id'])){
            $this->project = new Project();
           /*  $this->selectedManagers[] =  new User();
            $this->selectedSponsors[] =  new User();
            $this->selectedChampions[] =  new User();
            $this->selectedApManagers[] =  new User();
            $this->selectedApSponsors[] =  new User();
            $this->selectedApChampions[] =  new User();
            $this->selectedHoursActualValidators[] =  new User();
            $this->selectedSavingsActualValidators[] =  new User(); */
        }
        else{
            /* if($project->manager_id)
                $this->selectedManagers[] =  User::where(['id' => $project->manager_id])->first();
            if($project->sponsor_id)
                $this->selectedSponsors[] =  User::where(['id' => $project->sponsor_id])->first();
            if($project->champion_id)
                $this->selectedChampions[] =  User::where(['id' => $project->champion_id])->first();
            if($project->approved_manager_id)
                $this->selectedApManagers[] =  User::where(['id' => $project->approved_manager_id])->first();
            if($project->approved_sponsor_id)
                $this->selectedApSponsors[] =  User::where(['id' => $project->approved_sponsor_id])->first();
            if($project->approved_champion_id)
                $this->selectedApChampions[] =  User::where(['id' => $project->approved_champion_id])->first();
            if($project->hours_actual_validated_id)
                $this->selectedHoursActualValidators[] =  User::where(['id' => $project->hours_actual_validated_id])->first();
            if($project->savings_actual_validated_id)
                $this->selectedSavingsActualValidators[] =  User::where(['id' => $project->savings_actual_validated_id])->first(); */

            foreach(explode(",", $project->affected_areas) as $key=>$value){
                //replace keys (index) with values from db
                $this->selectedAfftectedAreas[$value] = $value;
            }

            $this->selectedLocations = $this->project->locations()->get();
        }
    }

    public function locationsCheckboxUpdated($locations){
        $this->selectedLocations = $locations;
    }

    /* public function locationSelected($locationId)
    {
        info('adding location ' . $locationId);
        $this->selectedLocations[] = Location::where(['id' => $locationId])->first();
        $this->isSearchLocationModalOpen = false;
    }

    public function openSearchUserModal($type){
        info ('openSearchUserModal: ' . $type);
        $this->searchType = $type;
        $this->isSearchUserModalOpen = true;
    }

    public function openSearchLocationModal(){

        $this->isSearchLocationModalOpen = true;
    } */

    /* public function closeSearchUserModal(){
        $this->isSearchUserModalOpen = false;
        $this->emit('searchUserModalClosed');//to display action message
    }

    public function closeSearchLocationModal(){
        $this->isSearchLocationModalOpen = false;
        $this->emit('searchLocationModalClosed');//to display action message
    } */

    /* public function userSelected($userId)
    {
        //info('adding user ' . $this->searchType . ' | id: '. $userId);
        switch ($this->searchType) {
            case 'manager':
                $this->selectedManagers[] = User::where(['id' => $userId])->first();
                break;
            case 'sponsor':
                $this->selectedSponsors[] = User::where(['id' => $userId])->first();
                break;
            case 'champion':
                $this->selectedChampions[] = User::where(['id' => $userId])->first();
                break;
            case 'ap_manager':
                $this->selectedApManagers[] = User::where(['id' => $userId])->first();
                break;
            case 'ap_sponsor':
                $this->selectedApSponsors[] = User::where(['id' => $userId])->first();
                break;
            case 'ap_champion':
                $this->selectedApChampions[] = User::where(['id' => $userId])->first();
                break;
            case 'hours_actual_validator':
                $this->selectedHoursActualValidators[] = User::where(['id' => $userId])->first();
                break;
            case 'savings_actual_validator':
                $this->selectedSavingsActualValidators[] = User::where(['id' => $userId])->first();
                break;
            default:
                $this->isSearchUserModalOpen = false;
                break;
        }

        $this->isSearchUserModalOpen = false;
    } */

    /* public function removeSelectedUser($index, $type)
    {
        info('removing user: index ' . $index);

        switch ($type) {
            case 'manager':
                unset($this->selectedManagers[$index]);
                break;
            case 'sponsor':
                unset($this->selectedSponsors[$index]);
                break;
            case 'champion':
                unset($this->selectedChampions[$index]);
                break;
            case 'ap_manager':
                unset($this->selectedApManagers[$index]);
                break;
            case 'ap_sponsor':
                unset($this->selectedApSponsors[$index]);
                break;
            case 'ap_champion':
                unset($this->selectedApChampions[$index]);
                break;

            default:
                break;
        }

        if(isset($this->project['id'])){
            switch ($type) {
                case 'manager':
                    $this->project->manager_id = null;
                    break;
                case 'sponsor':
                    $this->project->sponsor_id = null;
                    break;
                case 'champion':
                    $this->project->champion_id = null;
                    break;
                case 'ap_manager':
                    $this->project->approved_manager_id = null;
                    break;
                case 'ap_sponsor':
                    $this->project->approved_sponsor_id = null;
                    break;
                case 'ap_champion':
                    $this->project->approved_manager_id = null;
                    break;
                default:
                    break;
            }
            $this->project->save();
        }
    } */

    public function saveAsDraft(){
        $this->save();
    }

    public function submitProject(){
        $this->save(true);
    }

    private function save($asPosted = false)
    {
        $this->project->team_id = auth()->user()->currentTeam->id;
        $this->project->user_id =  auth()->user()->id;

        $this->project->affected_areas = implode(',', array_keys(array_filter($this->selectedAfftectedAreas)));

        info('saving project');

        /* if(isset($this->selectedManagers[0]))$this->project->manager_id = $this->selectedManagers[0]['id'];
        if(isset($this->selectedSponsors[0]))$this->project->sponsor_id = $this->selectedSponsors[0]['id'];
        if(isset($this->selectedChampions[0]))$this->project->champion_id = $this->selectedChampions[0]['id'];

        if(isset($this->selectedApManagers[0]))$this->project->approved_manager_id = $this->selectedManagers[0]['id'];
        if(isset($this->selectedApSponsors[0]))$this->project->approved_sponsor_id = $this->selectedApSponsors[0]['id'];
        if(isset($this->selectedApChampions[0]))$this->project->approved_champion_id = $this->selectedApChampions[0]['id'];

        if(isset($this->selectedHoursActualValidators[0]))$this->project->hours_actual_validated_id = $this->selectedHoursActualValidators[0]['id'];
        if(isset($this->selectedSavingsActualValidators[0]))$this->project->savings_actual_validated_id = $this->selectedSavingsActualValidators[0]['id'];
 */
        if(count($this->selectedLocations) == count(Location::where('area_id', null)->with('children')->get()[0]->children))
            $this->project->all_locations = 1;
        else
            $this->project->all_locations = 0;

        $this->validate();

        // Execution doesn't reach here if validation fails.
        if($asPosted)
            $this->project->posted =Carbon::now();

        $this->formatCleave();
        $this->project->save();

        $this->saveLocations();

        $this->emit('saved');//to display action message
        $this->emit('projectAdded', $this->project->id);

        $message = 'Project Form saved as draft: ' . $this->project->id;
        if($this->project->posted)
            $message = 'Project Form saved as Posted: ' . $this->project->id;
        session()->flash('message', $message);
       //return redirect()->to('/kaizen/' . $this->kaizen->id);
    }

    private function formatCleave(){
        $this->project->loss = trim(str_replace("$", "", $this->project->loss)) == '' ? null : trim(str_replace("$", "", $this->project->loss)) ;
        $this->project->budget = trim(str_replace("$", "", $this->project->budget)) == '' ? null : trim(str_replace("$", "", $this->project->budget)) ;
        $this->project->hours = trim(str_replace("$", "", $this->project->hours)) == '' ? null : trim(str_replace("$", "", $this->project->hours)) ;
        $this->project->savings = trim(str_replace("$", "", $this->project->savings)) == '' ? null : trim(str_replace("$", "", $this->project->savings)) ;
        $this->project->savings_actual = trim(str_replace("$", "", $this->project->savings_actual)) == '' ? null : trim(str_replace("$", "", $this->project->savings_actual)) ;
    }

    private function saveLocations(){
        info( 'saving locations...');

        $locations = [];
        foreach ($this->selectedLocations as $key => $location) {
            if(!empty($location))
                array_push($locations, $location['id']);
        }
        $this->project->locations()->sync($locations);
        $this->project->save();
        info( $this->project->locations);
    }

    public function render()
    {
        /* $this->hasManager = false;
        foreach ($this->selectedManagers as $key => $value) {
            if(isset($value['id'])){$this->hasManager = true;break;}
        }
        $this->hasSponsor = false;
        foreach ($this->selectedSponsors as $key => $value) {
            if(isset($value['id'])){$this->hasSponsor = true;break;}
        }
        $this->hasChampion = false;
        foreach ($this->selectedChampions as $key => $value) {
            if(isset($value['id'])){$this->hasChampion = true;break;}
        }
        $this->hasApManager = false;
        foreach ($this->selectedApManagers as $key => $value) {
            if(isset($value['id'])){$this->hasApManager = true;break;}
        }
        $this->hasApSponsor = false;
        foreach ($this->selectedApSponsors as $key => $value) {
            if(isset($value['id'])){$this->hasApSponsor = true;break;}
        }
        $this->hasApChampion = false;
        foreach ($this->selectedApChampions as $key => $value) {
            if(isset($value['id'])){$this->hasApChampion = true;break;}
        }
        $this->hasHoursActualValidator = false;
        foreach ($this->selectedHoursActualValidators as $key => $value) {
            if(isset($value['id'])){$this->hasHoursActualValidator = true;break;}
        }
        $this->hasSavingsActualValidator = false;
        foreach ($this->selectedSavingsActualValidators as $key => $value) {
            if(isset($value['id'])){$this->hasSavingsActualValidator = true;break;}
        }
 */
        $this->users = $this->getUsers();
        $this->stores = $this->getStores();
        $this->affectedAreas = $this->getAffectedAreas();
        /* sleep(1);
        $usersResults = User::search($this->term)->get(); */
        //info($usersResults);
        return view('livewire.project.nutters');
    }

    private function getStores()
    {
        return Location::get()->sortBy('name');
    }

    private function getAffectedAreas(){
        return RefAffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->get();

    }

    private function getUsers(){
        return auth()->user()->currentTeam->allUsers();

    }
}
