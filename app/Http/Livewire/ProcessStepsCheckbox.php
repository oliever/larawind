<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProcessStep;

class ProcessStepsCheckbox extends Component
{
    public $processSteps = [];
    public $selectAll = false;
    public $label = "";
    public $selected = [];

    public $rules = [
        'selected' => 'required|array'
    ];

    public function mount( $kaizen )
    {
        $this->selected =$kaizen->processSteps()->pluck('id')->toArray();
        $this->processSteps = ProcessStep::where(['team_id'=>auth()->user()->currentTeam->id])->get();
    }

    public function updated($key, $value)
    {
        /* info('updated');
        info('key: ' .$key);
        info( $value);
        info( $this->selected); */
        if('selectAll' == $key){
            if($value)
                $this->selected = ProcessStep::where(['team_id'=>auth()->user()->currentTeam->id])->pluck('id')->toArray();
            else
                $this->selected = [];
        }else{
            info('yo');
            info($this->selected);
        }
        $this->emit('processStepsCheckboxUpdated',$this->selected);
    }

    public function render()
    {
        $this->selectAll = count($this->selected) === count($this->processSteps);
        $this->label = "Process Steps";
        if($this->selectAll)
            $this->label = "All Process Steps";
        else if(isset($this->selected[0])){
            $selectedMC = ProcessStep::where(['id'=>$this->selected[0]])->first();
            $this->label = $selectedMC->name;
        }

        return view('livewire.processsteps-checkbox');
    }
}
