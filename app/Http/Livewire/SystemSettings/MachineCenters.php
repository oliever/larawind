<?php

namespace App\Http\Livewire\SystemSettings;

use Livewire\Component;
use App\Models\MachineCenter;

class MachineCenters extends Component
{
    public $machineCenters = [];
    protected $rules = [
        'machineCenters.*.name' => 'required|min:3',
    ];

    public function mount(){

        foreach(MachineCenter::where(['team_id'=>auth()->user()->currentTeam->id])->get() as $machineCenter){
            $this->machineCenters[$machineCenter->id] = $machineCenter;
        }
    }

    public function addMachineCenter(){

        $machineCenter = MachineCenter::make();
        $this->machineCenters[] = $machineCenter;
    }

    public function saveMachineCenter($index){
        if(!empty( $this->machineCenters[$index]['name'])){
            $this->machineCenters[$index]['team_id']= auth()->user()->currentTeam->id;
            $machineCenter = MachineCenter::create(
                $this->machineCenters[$index]
            );
            $machineCenter->save();
            $this->machineCenters[$index] = $machineCenter ;
            session()->flash('success', ['title'=>'MachineCenter saved.' , 'subtitle'=>' '. $this->machineCenters[$index]['name']]);
            $this->emit('saved');
        }else{
            session()->flash('failed', ['title'=>'MachineCenter name is required.' , 'subtitle'=>' '. $index]);
            $this->emit('saved');
        }
    }

    public function removeMachineCenter($index){
        info("removeMachineCenter {$index}");
        if(isset($this->machineCenters[$index])){
            $machineCenter = MachineCenter::find($this->machineCenters[$index]['id']);
            $machineCenter->delete();
            session()->flash('success', ['title'=>'MachineCenter deleted.' , 'subtitle'=>' '. $this->machineCenters[$index]['name']]);
            unset($this->machineCenters[$index]);
            $this->emit('saved');
        }
    }

    public function render()
    {
        return view('livewire.system-settings.machine-centers');
    }
}
