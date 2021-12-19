<?php

namespace App\Http\Livewire\SystemSettings;

use Livewire\Component;
use App\Models\Translation;

class CompanySettings extends Component
{
    public $editedItemIndex = null;
    public $editedItemField = null;
    public $translations = [];
    public $team = null;

    protected $rules = [
        'team.name' => 'required|min:5',
        'translations.*.value' => ['required'],
    ];

    protected $validationAttributes = [
        'translations.*.value' => 'Field Label',
    ];

    public function mount(){
        $this->translations = Translation::where('team_id',auth()->user()->currentTeam->id)->get()->toArray();
        $this->team = auth()->user()->currentTeam;
    }
    public function render()
    {
        return view('livewire.system-settings.company-settings');
    }

    public function save()
    {
        $this->validate();
        $this->team->save();
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

    public function saveItem($itemIndex)
    {
        $this->validate();

        $item = $this->translations[$itemIndex] ?? NULL;
        if (!is_null($item)) {
            optional(Translation::find($item['id']))->update($item);
        }
        $this->editedItemIndex = null;
        $this->editedItemField = null;
    }
}
