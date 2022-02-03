<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.dashboard.project-table', [
            'projects' => Project::where('team_id',auth()->user()->currentTeam->id)
                                    ->where('description', 'like', '%'.$this->search.'%')
                                    ->orderBy('id')->paginate(10)
        ]);
    }

    public function paginationView()
    {
        return 'livewire.pagination-links';
    }
}
