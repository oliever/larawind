<?php

namespace App\Http\Livewire\Employees;

use App\Models\Employee;
use App\Models\Location;
use Livewire\Component;

class Employees extends Component
{
    public $editedEmployeeIndex = null;
    public $editedEmployeeField = null;
    public $employees = [];
    public $locations = [];
    public $selectedLocation = null;

    public $designTemplate = 'tailwind';

    public bool $isActive;
    public $lastSavedName;

    protected $rules = [
        'employees.*.name' => ['required'],
        'employees.*.status' => ['required'],
        'employees.*.level' => ['required'],
        'employees.*.location' => ['required'],
        'selectedLocation' => [],
    ];

    protected $validationAttributes = [
        'employees.*.name' => 'Name',
        'employees.*.status' => 'status',
    ];

    public function mount()
    {
        $this->locations = Location::where('team_id',auth()->user()->currentTeam->id)->get();
        if(auth()->user()->level == "location_manager")
            $this->locations = Location::where('id',auth()->user()->location_locked)->get();
        $this->selectedLocation = $this->locations[0]->id;
        $this->employees = Employee::where('location_id', $this->selectedLocation)->get();

       /*  if(auth()->user()->level == "headoffice_admin")
        $this->employees = Employee::with('location')->get();
        else
        $this->employees = auth()->user()->employees()->with('location')->get();//  Employee::where('location_id', auth()->user()->location_locked)->get()->toArray(); */
    }

    public function render()
    {
        $this->employees = Employee::where('location_id', $this->selectedLocation)->get();
        return view('livewire.employees.employees', [
            'employees' => $this->employees
        ]);
    }

    public function editEmployee($employeeIndex)
    {

        $this->editedEmployeeIndex = $employeeIndex;
    }

    public function editEmployeeField($employeeIndex, $fieldName)
    {

        $this->editedEmployeeField = $employeeIndex . '.' . $fieldName;
    }

    public function saveEmployee($employeeIndex)
    {

        $this->validate();

        $employee = $this->employees[$employeeIndex] ?? NULL;
        if (!is_null($employee)) {
            optional(Employee::find($employee['id']))->update($employee->toArray());
        }
        $this->editedEmployeeIndex = null;
        $this->editedEmployeeField = null;
        $this->lastSavedName = $employee['name'];
        $this->emit('saved');
    }

    public function changeStatus($employeeIndex){
        //info($employeeIndex);
        //info($this->employees[$employeeIndex]);
        $employee = $this->employees[$employeeIndex] ?? NULL;
        if (!is_null($employee)) {
            $toUpdate = Employee::find($employee['id']);
            $toUpdate->status = $employee['status'];
            $toUpdate->save();
            //info(Employee::find($employee['id']));
            $this->lastSavedName = $employee['name'];
            $this->emit('saved');
        }
    }

    public function changeLevel($employeeIndex){
        $employee = $this->employees[$employeeIndex] ?? NULL;
        if (!is_null($employee)) {
            $toUpdate = Employee::find($employee['id']);
            $toUpdate->level = $employee['level'];
            $toUpdate->save();
            //info(Employee::find($employee['id']));
            $this->lastSavedName = $employee['name'];
            $this->emit('saved');
        }
    }

    public function changeLocation($employeeIndex){
        
        $employee = $this->employees[$employeeIndex] ?? NULL;
        info($employee['location']);
        if (!is_null($employee)) {
            $toUpdate = Employee::find($employee['id']);
            $toUpdate->location = $employee['location'];
            $toUpdate->save();
            //info(Employee::find($employee['id']));
            $this->lastSavedName = $employee['name'];
            $this->emit('saved');
        }
    }
}

