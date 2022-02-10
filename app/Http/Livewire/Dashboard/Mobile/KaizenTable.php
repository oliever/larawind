<?php

namespace App\Http\Livewire\Dashboard\Mobile;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Kaizen;

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
        return view('livewire.dashboard.mobile.kaizen-table', [
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
