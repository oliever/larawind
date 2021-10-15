<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;

class SearchLocationDropdown extends Component
{
    protected $listeners = ['locationSelected','searchLocationModalClosed'];

    public $search = '';
    public $selectedLocations;

    public function mount()
    {
        $this->search = '';
    }

    public function render()
    {
        $ids = array_column($this->selectedLocations, 'id');

        $searchResults  = [];
        if (strlen($this->search) >= 2) {
            $searchResults = Location::where('name', 'like', '%'.$this->search.'%')->whereNotIn('id', $ids)->get();
        }
        //info($searchResults);
        return view('livewire.search-location-dropdown', [
            'searchResults' => collect($searchResults )->take(7),
        ]);
    }

    public function locationSelected($locationId)
    {
        $this->search = '';//Clear search textbox
    }
    public function searchLocationModalClosed()
    {
        $this->search = '';//Clear search textbox
    }

}
