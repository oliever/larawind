<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Department;
use App\Models\Kaizen;
use Livewire\Component;
use App\Models\Location;

class TopStats extends Component
{
    public $topKaizenLocations;
    public $topProjectLocations;
    public $kaizenStarted;
    public $kaizenFinished;
    
    public function render()
    {
        $this->topKaizenLocations = Location::withCount('kaizens')->orderBy('kaizens_count','desc')->get()->take(3);
        $this->topProjectLocations = Location::withCount('projects')->orderBy('projects_count','desc')->get()->take(3);

        $this->topKaizenDepartments = Department::withCount('kaizens')->orderBy('kaizens_count','desc')->get()->take(3);
        //$this->topProjectDepartments = Department::withCount('projects')->orderBy('projects_count','desc')->get()->take(3);
        
        $this->kaizenStarted = Kaizen::where(['team_id'=>auth()->user()->currentTeam->id])->whereNotNull('approved')->get();
        $this->kaizenFinished = Kaizen::where(['team_id'=>auth()->user()->currentTeam->id,'completion'=>100])->whereNotNull('approved')->get();
        return view('livewire.dashboard.top-stats');
    }
}
