<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class UsersCheckbox extends Component
{
   // public $selectArea;
    public $selected = [];
    public $name;

    public $rules = [
        'name' => 'required|min:3',
        'selected' => 'required|array'
    ];

    public function render()
    {
        $users = User::get();
        return view('livewire.users-checkbox', [
            'users' => $users
        ]);
    }

    public function updated($key, $value)
    {
        $explode = Str::of($key)->explode('.');
        /* if ($explode[0] === 'selectArea' && is_numeric($value)) {
            $locationIds = Location::where('area_id', $value)->pluck('id')->map(fn($id) => (string)$id)->toArray();
            $this->selected = array_values(array_unique(array_merge_recursive($this->selected, $locationIds)));
        } elseif ($explode[0] === 'selectArea' && empty($value)) {
            $locationIds = Location::where('area_id', $explode[1])->pluck('id')->map(fn($id) => (string)$id)->toArray();
            $this->selected = array_merge(array_diff($this->selected, $locationIds));
        } */
        $this->emit('usersCheckboxUpdated',$this->selected);
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
