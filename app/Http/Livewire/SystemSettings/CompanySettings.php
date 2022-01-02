<?php

namespace App\Http\Livewire\SystemSettings;

use Livewire\Component;
use App\Models\Translation;
use App\Models\SystemSetting;

class CompanySettings extends Component
{
    public $editedItemIndex = null;
    public $editedItemField = null;
    public $team = null;
    public $customSectionPositionKaizen = null;
    public $customSectionPositionProject = null;

    protected $rules = [
        'team.name' => 'required|min:5',
        'customSectionPositionKaizen.value' => 'required|min:5',
        'customSectionPositionProject.value' => 'required|min:5',
    ];

    protected $validationAttributes = [
    ];

    public function mount(){
        $this->systemSettings = SystemSetting::where('team_id',auth()->user()->currentTeam->id)->get()->toArray();
        $this->customSectionPositionKaizen = SystemSetting::where(['team_id'=>auth()->user()->currentTeam->id, 'code'=>'custom_section_position_kaizen'])->first();
        $this->customSectionPositionProject = SystemSetting::where(['team_id'=>auth()->user()->currentTeam->id, 'code'=>'custom_section_position_project'])->first();
        $this->team = auth()->user()->currentTeam;
    }
    public function render(){
        return view('livewire.system-settings.company-settings');
    }

    public function save()
    {
        $this->validate();
        $this->team->save();
        $this->customSectionPositionKaizen->save();
        $this->customSectionPositionProject->save();
        session()->flash('success', ['title'=>'Company settings saved.' , 'subtitle'=>'']);

        $this->emit('saved');//to display action message
    }

    public function editItem($itemIndex)
    {
        $this->editedItemIndex = $itemIndex;
    }

    public function editItemField($productIndex, $fieldName)
    {
        $this->editedItemField = $productIndex . '.' . $fieldName;
    }


}
