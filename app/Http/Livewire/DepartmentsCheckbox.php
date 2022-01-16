<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;

class DepartmentsCheckbox extends Component
{
    public $departments = [];
    public $selectAll = false;
    public $label = "";
    public $selected = [];

    public $rules = [
        'selected' => 'required|array'
    ];

    public function mount( $kaizen )
    {
        $this->selected =$kaizen->departments()->pluck('id')->toArray();
        $this->departments = Department::where(['team_id'=>auth()->user()->currentTeam->id])->get();
    }

    public function updated($key, $value)
    {
        /* info('updated');
        info('key: ' .$key);
        info( $value);
        info( $this->selected); */
        if('selectAll' == $key){
            if($value)
                $this->selected = Department::where(['team_id'=>auth()->user()->currentTeam->id])->pluck('id')->toArray();
            else
                $this->selected = [];
        }else{
            info('yo');
            info($this->selected);
        }
        $this->emit('departmentsCheckboxUpdated',$this->selected);
    }

    public function render()
    {
        $this->selectAll = count($this->selected) === count($this->departments);
        $this->label = "Departments";
        if($this->selectAll)
            $this->label = "All Departments";
        return view('livewire.departments-checkbox');
    }
}
