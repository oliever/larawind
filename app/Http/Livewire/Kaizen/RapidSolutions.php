<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;
use App\Models\Kaizen;
use App\Models\RapidSolution;

class RapidSolutions extends Component
{
    public $rapidSolutions = [];
    public $kaizen;
    public $removedRapidSolutions = [];

    protected $listeners = ['kaizenAdded'];

    protected $rules = [
        'rapidSolutions.*.description' => 'required|min:5',
        'rapidSolutions.*.who' => 'required|min:5',
        'rapidSolutions.*.when' => 'required|min:5',
    ];

    public function mount(Kaizen $kaizen = null){
        $this->kaizen = $kaizen;
        foreach(RapidSolution::where(['kaizen_id'=>$this->kaizen->id])->get() as $solution){
            $this->rapidSolutions[$solution->id] = $solution;
        }
    }

    public function addRapidSolution(){

        $rapidSolution = RapidSolution::make();
        $this->rapidSolutions[] = $rapidSolution ;
    }

    public function kaizenAdded(Kaizen $kaizen){
        info('saving rapid solutions... ');

        foreach($this->rapidSolutions as $rapidSolution){
            // info(@" {$rapidCauses} {$rapidCauses}");
            //info($rapidCause);
            if(!isset($rapidSolution['id'])){
                $rapidSolution = RapidSolution::create([
                    'kaizen_id' => $kaizen->id,
                    'description' => $rapidSolution['description'],
                    'who' => $rapidSolution['who'],
                    'when' => $rapidSolution['when'],
                    'done' => isset($rapidSolution['done']) ? true : false ,
                ]);
            }
        }

        foreach($this->removedRapidSolutions as $removedRapidSolution){
            //info(json_encode($removedRapidCause, JSON_PRETTY_PRINT));
            $rapidSolution = RapidSolution::where(['id'=>$removedRapidSolution['id']])->first();
            if($rapidSolution)
                $rapidSolution->delete();
        }

        $this->rapidSolution = array();//reset
        foreach(RapidSolution::where(['kaizen_id'=>$this->kaizen->id])->get() as $solution){
            $this->rapidSolutions[$solution->id] = $solution;
        }
    }

    public function removeRapidSolution($index){
        //info($index);
        //info(json_encode($this->rapidCauses, JSON_PRETTY_PRINT));
        $this->removedRapidSolutions[] = $this->rapidSolutions[$index];
        unset($this->rapidSolutions[$index]);

        $this->rapidSolutions = array_values($this->rapidSolutions);
    }

    public function render()
    {
        return view('livewire.kaizen.rapid-solutions');
    }
}
