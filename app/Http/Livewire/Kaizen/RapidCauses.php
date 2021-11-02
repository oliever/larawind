<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;
use App\Models\Kaizen;
use App\Models\RapidCause;

class RapidCauses extends Component
{
    public $rapidCauses = [];
    public $kaizen;
    public $removedRapidCauses = [];

    //protected $listeners = ['kaizenAdded' => 'saveRapidCauses'];
    protected $listeners = ['kaizenAdded'];

    protected $rules = [
        'rapidCauses.*.description' => 'required|min:5',
        'rapidCauses.*.findings' => 'required|min:5',
        'rapidCauses.*.root_cause' => 'required|min:5',
    ];


    public function mount(Kaizen $kaizen = null){

        $this->kaizen = $kaizen;
        //$this->rapidCauses = RapidCause::where(['kaizen_id'=>$kaizen->id])->get();
        foreach(RapidCause::where(['kaizen_id'=>$this->kaizen->id])->get() as $cause){
            $this->rapidCauses[$cause->id] = $cause;
        }
    }

    public function addRapidCause(){
        /* $rapidCause =  new RapidCause();
        $newMember = Member::make(); */

        $rapidCause = RapidCause::make();
        $this->rapidCauses[] = $rapidCause ;
    }

    public function kaizenAdded(Kaizen $kaizen){
        if(count($this->rapidCauses))
            info('saving rapid causes: ' . count($this->rapidCauses));

        foreach($this->rapidCauses as $rapidCause){
            // info(@" {$rapidCauses} {$rapidCauses}");
            $description = isset($rapidCause['description']) ? $rapidCause['description'] : "";
            $findings = isset($rapidCause['findings']) ? $rapidCause['findings'] : "";
            $rootCause = isset($rapidCause['root_cause']) ? $rapidCause['root_cause'] : "";
            if(!isset($rapidCause['id'])){

                $rapidCause = RapidCause::create([
                    'kaizen_id' => $kaizen->id,
                    'description' => $description,
                    'findings' => $findings,
                    'root_cause' => $rootCause,
                ]);
            }else{
                $rapidCause = RapidCause::where('id',$rapidCause['id'])->first();
                $rapidCause->description = $description;
                $rapidCause->findings = $findings;
                $rapidCause->root_cause = $rootCause;
                $rapidCause->save();
            }
        }

        foreach($this->removedRapidCauses as $removedRapidCause){
            //info(json_encode($removedRapidCause, JSON_PRETTY_PRINT));
            $rapidCause = RapidCause::where(['id'=>$removedRapidCause['id']])->first();
            if($rapidCause)
                $rapidCause->delete();
        }

        $this->rapidCauses = array();//reset
        foreach(RapidCause::where(['kaizen_id'=>$kaizen->id])->get() as $cause){
            $this->rapidCauses[$cause->id] = $cause;
        }

    }

    public function removeRapidCause($index){
        //info($index);
        //info(json_encode($this->rapidCauses, JSON_PRETTY_PRINT));
        $this->removedRapidCauses[] = $this->rapidCauses[$index];
        unset($this->rapidCauses[$index]);

        $this->rapidCauses = array_values($this->rapidCauses);
    }


    public function render()
    {
       return view('livewire.kaizen.rapid-causes');
    }
}
