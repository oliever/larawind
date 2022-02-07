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
        //$this->selected =$kaizen->departments()->pluck('id')->toArray();
        $this->departments = Department::where(['team_id'=>auth()->user()->currentTeam->id])->get();
    }

    public function updatedSelectAll($value)
    {
        if($value)
            $this->selected = Department::where(['team_id'=>auth()->user()->currentTeam->id])->pluck('id');
        else
            $this->selected = [];
    }

   public function updatedSelected($value){
        info($value);
    }
    public function updated($key, $value)
    {
       // info($key);
        //info($value);
        //$this->emit('departmentsCheckboxUpdated',$this->selected);
    }

    public function render()
    {
        //info($this->selected);
        //info(Department::where(['team_id'=>auth()->user()->currentTeam->id])->pluck('id'));
        $this->selectAll = count($this->selected) === count(Department::where(['team_id'=>auth()->user()->currentTeam->id])->pluck('id'));
        $this->label = "Departments";
        if($this->selectAll)
            $this->label = "All Departments";
        return view('livewire.departments-checkbox');
    }
}
