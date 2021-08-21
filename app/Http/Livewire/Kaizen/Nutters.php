<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;
use App\Models\Kaizen;
use App\Models\Location;
use App\Models\RefAffectedArea;
use DateTime;
use Carbon\Carbon;


class Nutters extends Component
{
    public $kaizen;
    public $stores;
    public $affectedAreas;
    public $isRapid = false;
    public $isJustDoIt = true;
    public $selectedAfftectedAreas = [];

    public $isModalOpen = false;

    public $shown = false;

    protected $rules = [
        'kaizen.name' => 'required|min:5',
        'kaizen.location_id' => 'required',
        'kaizen.reason' => '',
        'kaizen.problem' => '',
        'kaizen.rapid' => '',
        'kaizen.just_do_it' => '',
        'kaizen.head_office_input' => '',
        'kaizen.causes' => '',
        'kaizen.handled_at_location' => '',
        'kaizen.solution' => '',
        'kaizen.expected_result' => '',
    ];

    public function mount(Kaizen $kaizen = null)
    {
        $this->kaizen = $kaizen;
        //$this->selectedAfftectedAreas = explode(",", $kaizen->affected_areas);
        foreach(explode(",", $kaizen->affected_areas) as $key=>$value){
            //replace keys (index) with values from db
            $this->selectedAfftectedAreas[$value] = $value;
        }
        if(!$kaizen){
            $this->kaizen = new Kaizen();
            $this->isJustDoIt = true;
            $this->isRapid = false;
            $this->kaizen->rapid = false;
            $this->kaizen->just_do_it = true;
            $this->kaizen->head_office_input = false;
            $this->kaizen->handled_at_location = false;
        }
    }

    public function openModal(){
        info($this->isModalOpen);
        $this->isModalOpen = true;
        info($this->isModalOpen);
    }

    public function saveAsDraft(){
        $this->save();
    }

    public function submitKaizen(){
        $this->save(true);
    }

    private function save($asProject = false)
    {
        info($this->selectedAfftectedAreas);
        $this->kaizen->rapid = $this->isRapid;
        $this->kaizen->just_do_it = $this->isJustDoIt;
        $this->kaizen->team_id = auth()->user()->currentTeam->id;
        $this->kaizen->user_id =  auth()->user()->id;
        $this->kaizen->head_office_input = $this->kaizen->head_office_input ? true : false;
        $this->kaizen->handled_at_location = $this->kaizen->head_office_input ? true : false;

        $this->kaizen->affected_areas = implode(',', array_keys($this->selectedAfftectedAreas));

        $this->validate();

        // Execution doesn't reach here if validation fails.
        if($asProject)
            $this->kaizen->to_project =Carbon::now();

        $this->kaizen->save();
        info('nutters kaizen saved');
        info($this->kaizen);

        $this->emit('saved');//to display action message
        $this->emit('kaizenAdded', $this->kaizen->id);//move this

        $message = 'Kaizen Form saved as draft: ' . $this->kaizen->id;
        if($this->kaizen->to_project)
            $message = 'Kaizen Form saved as Project: ' . $this->kaizen->id;
       session()->flash('message', $message);

    }

    public function render()
    {
        $this->stores = $this->getStores();
        $this->affectedAreas = $this->getAffectedAreas();
        return view('livewire.kaizen.nutters');
    }

    private function getStores()
    {
        return Location::get()->sortBy('name');
    }

    private function getAffectedAreas(){
        return RefAffectedArea::where(['team_id'=>auth()->user()->currentTeam->id])->get();
       /*  return array(
            '0' => (object) array(
                'key' => 'people',
                'value' => 'People'
             ),
             '1' => (object) array(
                'key' => 'warehouse',
                'value' => 'Warehouse'
             ),
             '2' => (object) array(
                'key' => 'head_office',
                'value' => 'Head Office'
             ),
             '3' => (object) array(
                'key' => 'safety',
                'value' => 'Safety'
             ),
             '4' => (object) array(
                'key' => 'inventory',
                'value' => 'Inventory'
             ),
             '5' => (object) array(
                'key' => 'receiving',
                'value' => 'Receiving'
             ),
             '6' => (object) array(
                'key' => 'cost_buying',
                'value' => 'Cost/buying'
             ),
             '7' => (object) array(
                'key' => 'margin',
                'value' => 'Margin'
             ),
             '8' => (object) array(
                'key' => 'all_stores',
                'value' => 'All Stores'
             ),
             '9' => (object) array(
                'key' => 'policy_procedure',
                'value' => 'Policy/Procedure'
             ),
             '10' => (object) array(
                'key' => 'pricing',
                'value' => 'Pricing'
             ),
             '11' => (object) array(
                'key' => 'technology',
                'value' => 'Technology'
             ),
             '12' => (object) array(
                'key' => 'order',
                'value' => 'Order'
             ),
             '13' => (object) array(
                'key' => 'cost',
                'value' => 'Cost'
             ),
             '14' => (object) array(
                'key' => 'other',
                'value' => 'Other'
             ),
        ); */
    }
}
