<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;

class RapidCauses extends Component
{
    public $rapidCauses = [];

    public function mount(){

    }

    public function addRapidCause(){
        $this->rapidCauses[] = ['rapid_cause_id' => ''];
    }

    public function removeRapidCause($index){
        unset($this->rapidCauses[$index]);
        $this->rapidCauses = array_values($this->rapidCauses);
    }


    public function render()
    {
        return view('livewire.kaizen.rapid-causes');
    }
}
