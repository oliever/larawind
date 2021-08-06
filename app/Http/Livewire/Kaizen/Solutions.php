<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;

class Solutions extends Component
{
    public $solutions = [];
    protected $listeners = ['kaizenAdded'];

    public function mount(){

    }

    public function kaizenAdded($n){//(Kaizen $kaizen){
        //info('saving causes... ' . $kaizen->id);
        info($this->solutions);
        /* foreach($this->rapidCauses as $rapidCause){
            // info(@" {$rapidCauses} {$rapidCauses}");
            $rapidCause = RapidCause::create([
                'kaizen_id' => $kaizen->id,
                'description' => $rapidCause['description'],
                'findings' => $rapidCause['findings'],
                'root_cause' => $rapidCause['rootCause'],
            ]);
        } */
    }

    public function addSolution(){
        $this->solutions[] = ['id' => ''];
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
