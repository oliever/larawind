<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AffectedArea;

class AffectedAreasCheckbox extends Component
{
    public $affectedAreas = [];
    public $selectAll = false;
    public $label = "";
    public $selected = [];

    public $rules = [
        'selected' => 'required|array'
    ];

    public function mount( $kaizen )
    {
        $this->selected =$kaizen->affectedAreas()->pluck('id')->toArray();
        $this->affectedAreas = AffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->get();
    }

    public function updated($key, $value)
    {
        /* info('updated');
        info('key: ' .$key);
        info( $value);
        info( $this->selected); */
        if('selectAll' == $key){
            if($value)
                $this->selected = AffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->pluck('id')->toArray();
            else
                $this->selected = [];
        }else{
            info('yo');
            info($this->selected);
        }
        $this->emit('affectedAreasCheckboxUpdated',$this->selected);
    }

    public function render()
    {
        $this->selectAll = count($this->selected) === count($this->affectedAreas);
        $this->label = "Affected Areas";
        if($this->selectAll)
            $this->label = "All Affected Areas";
        else if(isset($this->selected[0])){
            $selectedAA = AffectedArea::where(['id'=>$this->selected[0]])->first();
            $this->label = $selectedAA->name;
        }
        return view('livewire.affected-areas-checkbox');
    }
}
