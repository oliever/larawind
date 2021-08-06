<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;
use App\Models\Kaizen;
use App\Models\RapidCause;

class RapidCauses extends Component
{
    public $rapidCauses = [];

    //protected $listeners = ['kaizenAdded' => 'saveRapidCauses'];
    protected $listeners = ['kaizenAdded'];

    public function mount(){

    }

    public function addRapidCause(){
        $this->rapidCauses[] = ['id' => ''];
    }

    public function kaizenAdded($n){//(Kaizen $kaizen){
        //info('saving causes... ' . $kaizen->id);
        info($this->rapidCauses);
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

    public function removeRapidCause($index){
        unset($this->rapidCauses[$index]);
        $this->rapidCauses = array_values($this->rapidCauses);
    }


    public function render()
    {
       return view('livewire.kaizen.rapid-causes');
    }
}
