<?php

namespace App\Http\Livewire\Kaizen;

use Livewire\Component;
use App\Models\Kaizen;

class Nutters extends Component
{
    public Kaizen $kaizen;
    public $stores;
    public $affectedAreas;
    public $isRapid = false;
    public $isJustDoIt = false;
    public $selectedAfftectedAreas = [];

    public $isModalOpen = false;

    public $shown = false;

    protected $rules = [
        'kaizen.name' => 'required|min:5',
        'kaizen.location_id' => 'required',
        'kaizen.reason' => '',
        'kaizen.problem' => 'required|min:5',
        'kaizen.rapid' => '',
        'kaizen.just_do_it' => '',
        'kaizen.head_office_input' => '',
        'kaizen.causes' => '',
        'kaizen.handled_at_location' => '',
        'kaizen.solution' => '',
        'kaizen.expected_result' => '',
    ];

    public function mount()
    {

        $this->kaizen = new Kaizen();
        $this->kaizen->rapid = false;
        $this->kaizen->just_do_it = false;

        /* $this->selectedAfftectedAreas['safety'] = true; */

    }

    public function openModal(){
        info($this->isModalOpen);
        $this->isModalOpen = true;
        info($this->isModalOpen);
    }

    public function save()
    {
        //session()->flash('message', 'Post successfully updated.');
        //$this->isModalOpen = true;
        info($this->selectedAfftectedAreas);

        $this->kaizen->affected_areas = implode(', ', array_keys($this->selectedAfftectedAreas));

        info($this->kaizen->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        $this->emit('kaizenAdded', 0);
        $this->emit('saved');//to display action message
        //$valid = $this->validate();
        $this->validate();
       /*  if($valid){
            session()->flash('message', 'Form errors found.');
        } */

        // Execution doesn't reach here if validation fails.
        $this->kaizen->user_id =  auth()->user()->id;
         //$kaizen = Kaizen::create($this->kaizen);
        $this->kaizen->save();
        session()->flash('message', 'Kaizen Form saved: ' . $this->kaizen->id);



    }



    public function render()
    {
        $this->stores = $this->getStores();
        $this->affectedAreas = $this->getAffectedAreas();
        return view('livewire.kaizen.nutters');
    }

    private function getStores()
    {
        return array(
            '0' => (object) array(
                'id' => '1',
                'name' => 'Med Hat'
             ),
        );
    }

    private function getAffectedAreas(){
        return array(
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
        );
    }
}
