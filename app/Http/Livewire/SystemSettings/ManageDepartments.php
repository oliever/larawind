<?php

namespace App\Http\Livewire\SystemSettings;

use Livewire\Component;
use App\Models\Department;

class ManageDepartments extends Component
{
    public $departments = [];


    protected $rules = [
        'departments.*.name' => 'required|min:3',
    ];


    public function mount(){

        foreach(Department::where(['team_id'=>auth()->user()->currentTeam->id])->get() as $department){
            $this->departments[$department->id] = $department;
        }
    }

    public function addDepartment(){

        $department = Department::make();
        $this->departments[] = $department;
    }

    public function saveDepartment($index){
        if(!empty( $this->departments[$index]['name'])){
            $this->departments[$index]['team_id']= auth()->user()->currentTeam->id;
            $department = Department::create(
                $this->departments[$index]
            );
            $department->save();
            $this->departments[$index] = $department ;
            session()->flash('success', ['title'=>'Affected Area saved.' , 'subtitle'=>' '. $this->departments[$index]['name']]);
            $this->emit('saved');
        }else{
            session()->flash('failed', ['title'=>'Affected Area name is required.' , 'subtitle'=>' '. $index]);
            $this->emit('saved');
        }


    }


    public function removeDepartment($index){
        info("removeDepartment {$index}");
        $department = Department::find($this->departments[$index]['id']);
        $department->delete();
        session()->flash('success', ['title'=>'Affected Area deleted.' , 'subtitle'=>' '. $this->departments[$index]['name']]);
        unset($this->departments[$index]);
        $this->emit('saved');
    }


    public function render()
    {
       return view('livewire.system-settings.manage-departments');
    }
}

