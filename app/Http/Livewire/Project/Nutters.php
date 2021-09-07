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

    protected $rules = [
        'project.description' => 'required|min:5',
        'project.location_id' => 'required',
        'project.leader_id' => 'required',
        'project.sponsor_id' => 'required',
        'project.champion_id' => 'required',
        'project.primary_team' => 'required',
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
        'project.approved_manager' => '',
        'project.approved_sponsor' => '',
        'project.approved_champion' => '',
        'project.hours_actual' => '',
        'project.hours_actual_validated' => '',
        'project.savings_actual' => '',
        'project.savings_actual_validated' => '',
    ];

    public function mount(Project $project = null)
    {
        $this->project = $project;
        //$this->selectedAfftectedAreas = explode(",", $kaizen->affected_areas);


       if(!isset($this->project['id'])){
            $this->project = new Project();

        }
        else{
            foreach(explode(",", $project->affected_areas) as $key=>$value){
                //replace keys (index) with values from db
                $this->selectedAfftectedAreas[$value] = $value;
            }
        }
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

        $this->project->affected_areas = implode(',', array_keys(array_filter($this->selectedAfftectedAreas)));

        $this->validate();

        // Execution doesn't reach here if validation fails.
        if($asPosted)
            $this->project->posted =Carbon::now();

        $this->project->save();
        info('nutters project saved:');
        info($this->project);

        $this->emit('saved');//to display action message
        $this->emit('projectAdded', $this->project->id);

        $message = 'Project Form saved as draft: ' . $this->project->id;
        if($this->project->posted)
            $message = 'Project Form saved as Posted: ' . $this->project->id;
       session()->flash('message', $message);
       //return redirect()->to('/kaizen/' . $this->kaizen->id);
    }

    public function render()
    {
        $this->users = $this->getUsers();
        $this->stores = $this->getStores();
        $this->affectedAreas = $this->getAffectedAreas();
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
