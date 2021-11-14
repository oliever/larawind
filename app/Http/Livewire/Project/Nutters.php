<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\Location;
use App\Models\Employee;
use App\Models\RefAffectedArea;
use App\Models\User;
use DateTime;
use Carbon\Carbon;
use App\Models\Role;


class Nutters extends Component
{
    public $employee;
    public $project;
    public $stores;
    public $users;
    public $employees;
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

    public function mount($employee = null, Project $project = null)
    {
        if(auth()->user()->shared)
            $this->employee = $employee;
        info($this->employee);

        $this->users = auth()->user()->currentTeam->allUsers();
        $this->project = $project;
        info("--Nutters::mount project-- " . $this->project->id);
        $locationLocked = Location::where('id', auth()->user()->location_locked)->first();
        info($locationLocked);
        //if(auth()->user()->locked_location)

        $this->employees = Employee::get();
        if($locationLocked){
            $this->employees = $locationLocked->employees()->get();//Employee::where('location_id', $locationLocked->id)->get();
            info($this->employees);
        }

        //$this->selectedAfftectedAreas = explode(",", $kaizen->affected_areas);

        //$this->selectedLocations[] =  new Location();

       if(!isset($this->project['id'])){
            $this->project = new Project();
        }
        else{
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
        if(auth()->user()->shared){
            $this->project->employee_id = $this->employee->id;
        }

        $this->project->affected_areas = implode(',', array_keys(array_filter($this->selectedAfftectedAreas)));

        info('saving project');

        if(count($this->selectedLocations) == count(Location::where('area_id', null)->with('children')->get()[0]->children))
            $this->project->all_locations = 1;
        else
            $this->project->all_locations = 0;

        if(!$this->project->completion)
            $this->project->completion = 0;

        $this->validate();

        // Execution doesn't reach here if validation fails.
        if($asPosted)
            $this->project->posted =Carbon::now();

        //$this->formatCleave();
        info($this->project);
        $this->project->save();

        $this->saveLocations();

        $this->emit('saved');//to display action message
        $this->emit('projectAdded', $this->project->id);

        /* $message = 'Project Form saved as draft: ' . $this->project->id;
        if($this->project->posted)
            $message = 'Kaizen Project Form Saved! ' ; */
        session()->flash('success', ['title'=>'Kaizen Project Form Saved!' , 'subtitle'=>'ID: '. str_pad($this->project->id, 4,"0", STR_PAD_LEFT)]);
       //return redirect()->to('/kaizen/' . $this->kaizen->id);
    }

    /* private function formatCleave(){
        $this->project->loss = trim(str_replace("$", "", $this->project->loss)) == '' ? null : trim(str_replace(",", "",str_replace("$", "", $this->project->loss))) ;
        $this->project->budget = trim(str_replace("$", "", $this->project->budget)) == '' ? null : trim(str_replace(",", "",str_replace("$", "", $this->project->budget))) ;
        $this->project->hours = trim(str_replace("$", "", $this->project->hours)) == '' ? null : trim(str_replace(",", "",str_replace("$", "", $this->project->hours))) ;
        $this->project->savings = trim(str_replace("$", "", $this->project->savings)) == '' ? null : trim(str_replace(",", "",str_replace("$", "", $this->project->savings)));
        $this->project->savings_actual = trim(str_replace("$", "", $this->project->savings_actual)) == '' ? null : trim(str_replace(",", "",str_replace("$", "", $this->project->savings_actual))) ;
    } */

    private function saveLocations(){
        $locations = [];
        foreach ($this->selectedLocations as $key => $location) {
            if($location instanceof Location){
                if(!empty($location))
                    array_push($locations, $location->id);
            }
            else
                array_push($locations, $location);
        }
        info( 'sync locations...');
        $this->project->locations()->sync($locations);
        $this->project->save();
    }

    public function render()
    {

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
