<?php

namespace App\Http\Livewire\SystemSettings;

use Livewire\Component;
use App\Models\RefAffectedArea;

class AffectedAreas extends Component
{
    public $affectedAreas = [];


    protected $rules = [
        'affectedAreas.*.name' => 'required|min:5',
    ];


    public function mount(){

        foreach(RefAffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->get() as $affectedArea){
            $this->affectedAreas[$affectedArea->id] = $affectedArea;
        }
    }

    public function addAffectedArea(){

        $affectedArea = RefAffectedArea::make();
        $this->affectedAreas[] = $affectedArea ;
/*
        foreach ($this->affectedAreas as $key => $value) {
            if(isset($value['id'])){
                info($value['id']);
            }
        } */
    }

    public function saveAffectedArea($index){
        //info($this->affectedAreas[$index]['name']);
        if(!empty( $this->affectedAreas[$index]['name'])){
            $this->affectedAreas[$index]['team_id']= auth()->user()->currentTeam->id;
            $affectedArea = RefAffectedArea::create(
                $this->affectedAreas[$index]
            );
            $affectedArea->save();
            $this->affectedAreas[$index] = $affectedArea ;
            session()->flash('success', ['title'=>'Affected Area saved.' , 'subtitle'=>' '. $this->affectedAreas[$index]['name']]);
            $this->emit('saved');
        }else{
            session()->flash('failed', ['title'=>'Affected Area name is required.' , 'subtitle'=>' '. $index]);
            $this->emit('saved');
        }


    }


    public function removeAffectedArea($index){
        info("removeAffectedArea {$index}");
        $affectedArea = RefAffectedArea::find($this->affectedAreas[$index]['id']);
        $affectedArea->delete();
        session()->flash('success', ['title'=>'Affected Area deleted.' , 'subtitle'=>' '. $this->affectedAreas[$index]['name']]);
        unset($this->affectedAreas[$index]);
        $this->emit('saved');
    }


    public function render()
    {
       return view('livewire.system-settings.affected-areas');
    }
}

