<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MachineCenter;

class MachineCentersCheckbox extends Component
{
    public $machineCenters = [];
    public $selectAll = false;
    public $label = "";
    public $selected = [];

    public $rules = [
        'selected' => 'required|array'
    ];

    public function mount( $kaizen )
    {
        $this->selected =$kaizen->machineCenters()->pluck('id')->toArray();
        $this->machineCenters = MachineCenter::where(['team_id'=>auth()->user()->currentTeam->id])->get();
    }

    public function updated($key, $value)
    {
        /* info('updated');
        info('key: ' .$key);
        info( $value);
        info( $this->selected); */
        if('selectAll' == $key){
            if($value)
                $this->selected = MachineCenter::where(['team_id'=>auth()->user()->currentTeam->id])->pluck('id')->toArray();
            else
                $this->selected = [];
        }else{
            info('yo');
            info($this->selected);
        }
        $this->emit('machineCentersCheckboxUpdated',$this->selected);
    }

    public function render()
    {
        $this->selectAll = count($this->selected) === count($this->machineCenters);
        $this->label = "Machine Centers";
        if($this->selectAll)
            $this->label = "All Machine Centers";
        return view('livewire.machinecenters-checkbox');
    }
}
