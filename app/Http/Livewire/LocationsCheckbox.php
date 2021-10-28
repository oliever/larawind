<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Illuminate\Support\Str;
use Livewire\Component;

class LocationsCheckbox extends Component
{
    public $selectArea;
    public $selected = [];
    public $name;

    public $rules = [
        'name' => 'required|min:3',
        'selected' => 'required|array'
    ];

    public function render()
    {
        $locations = Location::where('area_id', null)->with('children')->get();
        info($locations );
        return view('livewire.locations-checkbox', [
            'locations' => $locations
        ]);
    }

    public function updated($key, $value)
    {
        $explode = Str::of($key)->explode('.');
        if ($explode[0] === 'selectArea' && is_numeric($value)) {
            $locationIds = Location::where('area_id', $value)->pluck('id')->map(fn($id) => (string)$id)->toArray();
            $this->selected = array_values(array_unique(array_merge_recursive($this->selected, $locationIds)));
        } elseif ($explode[0] === 'selectArea' && empty($value)) {
            $locationIds = Location::where('area_id', $explode[1])->pluck('id')->map(fn($id) => (string)$id)->toArray();
            $this->selected = array_merge(array_diff($this->selected, $locationIds));
        }
    }

    public function save()
    {
        /* $this->validate();

        $subscription = Subscription::create([
            'name' => $this->name
        ]);

        $subscription->topics()->attach($this->selected);

        $this->reset(['name', 'selected', 'selectGroup']); */
    }
}
