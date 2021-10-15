<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class SearchUserDropdown extends Component
{

    protected $listeners = ['userSelected','searchUserModalClosed'];

    public $search = '';
    public $selectedUsers = [];

    public function mount( $selectedUsers)
    {
        $this->selectedUsers = $selectedUsers;
        $this->search = '';
    }

    public function render()
    {
        $ids = array_column($this->selectedUsers, 'id');

        $searchResults  = [];
        if (strlen($this->search) >= 2) {
            $searchResults = User::where('name', 'like', '%'.$this->search.'%')->whereNotIn('id', $ids)->get();
        }
        //info($searchResults);
        return view('livewire.search-user-dropdown', [
            'searchResults' => collect($searchResults )->take(7),
        ]);
    }

    public function userSelected($userId)
    {
        $this->search = '';//Clear search textbox
    }
    public function searchUserModalClosed()
    {
        $this->search = '';//Clear search textbox
    }

}
