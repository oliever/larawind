<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use App\Models\Location;
use App\Models\Employee;
use App\Models\AffectedArea;
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
    public $affectedAreas = [];
    public $departments = [];
    public $term;
    public $usersResults = [];

    public $isSearchUserModalOpen = false;
    public $searchType;/* manager, sponsor, champion, ap_manager, ap_sponsor, ap_champion, hours_actual_validator, savings_actual_validator*/


    public $isSearchLocationModalOpen = false;
    public $selectedLocations = [];


    /* protected $listeners = ['userSelected','locationSelected']; */
    protected $listeners = ['locationsCheckboxUpdated','affectedAreasCheckboxUpdated', 'departmentsCheckboxUpdated'];

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

        $this->users = auth()->user()->currentTeam->allUsers();
        $this->project = $project;
        info("--Nutters::mount project-- " . $this->project->id);
        $locationLocked = Location::where('id', auth()->user()->location_locked)->first();

        $this->employees = Employee::get();
        if($locationLocked){
            $this->employees = $locationLocked->employees()->get();//Employee::where('location_id', $locationLocked->id)->get();
        }

       if(!isset($this->project['id'])){
            $this->project = new Project();
        }
        else{


            $this->selectedLocations = $this->project->locations()->get();
            $this->affectedAreas = $this->project->affectedAreas()->get();
        }
    }

    public function locationsCheckboxUpdated($locations){
        $this->selectedLocations = $locations;
    }

    public function affectedAreasCheckboxUpdated($affectedAreas){
        $this->affectedAreas = $affectedAreas;
    }

    public function departmentsCheckboxUpdated($departments){
        $this->departments = $departments;
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

        $this->project->affectedAreas()->sync($this->affectedAreas);
        $this->project->departments()->sync($this->departments);

        $this->emit('saved');//to display action message
        $this->emit('projectAdded', $this->project->id);

        /* $message = 'Project Form saved as draft: ' . $this->project->id;
        if($this->project->posted)
            $message = 'Kaizen Project Form Saved! ' ; */
        session()->flash('success', ['title'=>'Kaizen Project Form Saved!' , 'subtitle'=>'ID: '. str_pad($this->project->id, 4,"0", STR_PAD_LEFT)]);
       //return redirect()->to('/kaizen/' . $this->kaizen->id);
    }


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
        /* sleep(1);
        $usersResults = User::search($this->term)->get(); */
        //info($usersResults);
        return view('livewire.project.nutters');
    }

    private function getStores()
    {
        return Location::get()->sortBy('name');
    }

    private function getUsers(){
        return auth()->user()->currentTeam->allUsers();

    }
}
