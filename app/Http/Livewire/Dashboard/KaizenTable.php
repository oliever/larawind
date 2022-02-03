<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Kaizen;
use Livewire\WithPagination;

class KaizenTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //info(Kaizen::paginate(2));
        return view('livewire.dashboard.kaizen-table', [
            'kaizens' => Kaizen::where('team_id',auth()->user()->currentTeam->id)
                                    ->where('name', 'like', '%'.$this->search.'%')
                                    ->orderBy('id')->paginate(10)
        ]);
    }

    public function paginationView()
    {
        return 'livewire.pagination-links';
    }
}
