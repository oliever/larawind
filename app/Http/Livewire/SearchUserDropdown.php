<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchUserDropdown extends Component
{

    public $search = '';

    public function mount()
    {
        $this->search = '';
    }

    public function render()
    {
        $searchResults  = [];
        if (strlen($this->search) >= 2) {
            $searchResults = User::where('name', 'like', '%'.$this->search.'%')->get();
        }
        //info($searchResults);
        return view('livewire.search-user-dropdown', [
            'searchResults' => collect($searchResults )->take(7),
        ]);
    }

}
