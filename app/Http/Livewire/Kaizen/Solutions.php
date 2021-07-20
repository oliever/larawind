<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;

class Solutions extends Component
{
    public $solutions = [];

    public function mount(){

    }

    public function addSolution(){
        $this->solutions[] = ['solutions_id' => ''];
    }

    public function removeSolution($index){
        unset($this->solutions[$index]);
        $this->solutions = array_values($this->solutions);
    }



    public function render()
    {
        return view('livewire.kaizen.solutions');
    }
}
