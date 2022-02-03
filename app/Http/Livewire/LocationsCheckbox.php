<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\Translation;
use Illuminate\Support\Str;
use Livewire\Component;

class LocationsCheckbox extends Component
{
    public $selectArea;
    public $selected = [];
    public $locations = [];

    public $rules = [
        'selected' => 'required|array'
    ];

    public function mount( $selectedLocations)
    {
        foreach ($selectedLocations as $value) {
            $this->selected[] = strval($value->id);
        }
        $this->locations = Location::where('team_id',auth()->user()->currentTeam->id)->where('area_id', null)->with('children')->get();
        if(count($this->locations[0]->children) === count($this->selected)){
            $this->selectArea[99] = true;//TODO: find parent instead of 99
        }
    }

    public function render()
    {
        $label = 'Select ' . t('kaizen_general','location');
        if(isset($this->selectArea[99])){
            if($this->selectArea[99])
                $label = 'All '. Str::plural(t('kaizen_general','location'));
            else if(count($this->selected)){
                $location = Location::where(['team_id'=>auth()->user()->currentTeam->id,'id'=> $this->selected[0]])->first();
                if($location)
                    $label = $location->name;
            }
        }else if(count($this->selected)){
                $location = Location::where('id', $this->selected[0])->first();
                if($location)
                    $label = $location->name;
            }



        return view('livewire.locations-checkbox', [
            'locations' =>  $this->locations,
            'label' => $label
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

        if(count($this->locations[0]->children) > count($this->selected) && isset($this->selectArea[99])){
            $this->selectArea[99] = false;//TODO: find parent instead of 99
        }
        $this->emit('locationsCheckboxUpdated',$this->selected);
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
