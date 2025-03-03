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

    public function mount( $selectedUsers)
    {
        foreach ($selectedUsers as $value) {
            $this->selected[] = strval($value->id);
        }
    }

    public function render()
    {
        $users = auth()->user()->currentTeam->allUsers();
        $label = 'Select members';
        if(count($this->selected) == count($users))
            $label = "All members";
        else if(count($this->selected)){
            $user = User::where('id' , $this->selected[0])->first();
            $label = $user->name;
        }
        return view('livewire.users-checkbox', [
            'users' => $users,
            'label' => $label
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
