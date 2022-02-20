<?php

namespace App\Http\Livewire\SystemSettings;

use Livewire\Component;
use App\Models\ProcessStep;

class ProcessSteps extends Component
{
    public $processSteps = [];
    protected $rules = [
        'processSteps.*.name' => 'required|min:3',
    ];

    public function mount(){

        foreach(ProcessStep::where(['team_id'=>auth()->user()->currentTeam->id])->get() as $processStep){
            $this->processSteps[$processStep->id] = $processStep;
        }
    }

    public function addProcessStep(){

        $processStep = ProcessStep::make();
        $this->processSteps[] = $processStep;
    }

    public function saveProcessStep($index){
        if(!empty( $this->processSteps[$index]['name'])){
            $this->processSteps[$index]['team_id']= auth()->user()->currentTeam->id;
            $processStep = ProcessStep::create(
                $this->processSteps[$index] 
            );
            $processStep->save();
            $this->processSteps[$index] = $processStep ;
            session()->flash('success', ['title'=>'Process Step saved.' , 'subtitle'=>' '. $this->processSteps[$index]['name']]);
            $this->emit('saved');
        }else{
            session()->flash('failed', ['title'=>'Process Step name is required.' , 'subtitle'=>' '. $index]);
            $this->emit('saved');
        }
    }

    public function removeProcessStep($index){
        info("removeProcessStep {$index}");
        if(isset($this->processSteps[$index])){
            $processStep = ProcessStep::find($this->processSteps[$index]['id']);
            $processStep->delete();
            session()->flash('success', ['title'=>'Process Step deleted.' , 'subtitle'=>' '. $this->processSteps[$index]['name']]);
            unset($this->processSteps[$index]);
            $this->emit('saved');
        }
    }

    public function render()
    {
        return view('livewire.system-settings.process-steps');
    }
}
