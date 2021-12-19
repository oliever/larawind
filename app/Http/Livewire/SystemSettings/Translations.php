<?php

namespace App\Http\Livewire\SystemSettings;

use Livewire\Component;
use App\Models\Translation;

class Translations extends Component
{
    public $editedItemIndex = null;
    public $editedItemField = null;
    public $translations = [];

    protected $rules = [
        'translations.*.value' => ['required'],
    ];

    protected $validationAttributes = [
        'translations.*.value' => 'Field Label',
    ];

    public function mount(){
        $this->translations = Translation::where('team_id',auth()->user()->currentTeam->id)->get()->toArray();
    }
    public function render()
    {
        return view('livewire.system-settings.translations', [
            'translations' => $this->translations
        ]);
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
