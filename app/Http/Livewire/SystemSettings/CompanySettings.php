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

    //toggle
    public $dashboardKaizenColumnLocation = null;
    public $dashboardKaizenColumnHeadOfficeInput = null;
    public $dashboardKaizenColumnHandleAtLocation = null;
    public $dashboardKaizenColumnProcessStep = null;
    public $dashboardKaizenColumnMachineCenter = null;
    public $dashboardKaizenColumnDepartment = null;

    protected $rules = [
        'team.name' => 'required|min:5',
        'customSectionPositionKaizen.value' => 'required|min:5',
        'customSectionPositionProject.value' => 'required|min:5',
        'dashboardKaizenColumnLocation' => '',
        'dashboardKaizenColumnHeadOfficeInput' => '',
        'dashboardKaizenColumnHandleAtLocation' => '',
        'dashboardKaizenColumnProcessStep' => '',
        'dashboardKaizenColumnMachineCenter' => '',
        'dashboardKaizenColumnDepartment' => '',
    ];

    protected $validationAttributes = [
    ];

    public function mount(){
        $this->team = auth()->user()->currentTeam;
        info($this->team);
        $this->systemSettings = SystemSetting::where('team_id',$this->team->id)->get()->toArray();
        $this->customSectionPositionKaizen = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>'custom_section_position_kaizen'])->first();
        $this->customSectionPositionProject = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>'custom_section_position_project'])->first();
        
        //toggle
        $this->dashboardKaizenColumnLocation = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>'dashboard_kaizen_column_location'])->first()->value == "1";
        $this->dashboardKaizenColumnHeadOfficeInput = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>'dashboard_kaizen_column_head_office_input'])->first()->value == "1";
        $this->dashboardKaizenColumnHandleAtLocation = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>'dashboard_kaizen_column_handle_at_location'])->first()->value == "1";
        $this->dashboardKaizenColumnProcessStep = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>'dashboard_kaizen_column_process_step'])->first()->value == "1";
        $this->dashboardKaizenColumnMachineCenter = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>'dashboard_kaizen_column_machine_center'])->first()->value == "1";
        $this->dashboardKaizenColumnDepartment = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>'dashboard_kaizen_column_department'])->first()->value == "1";

    }
    public function render(){
        info($this->dashboardKaizenColumnLocation);
        return view('livewire.system-settings.company-settings');
    }

    public function save()
    {
        info($this->dashboardKaizenColumnLocation);
        $this->validate();
        $this->team->save();
        $this->customSectionPositionKaizen->save();
        $this->customSectionPositionProject->save();
        $this->toggle('dashboard_kaizen_column_location', $this->dashboardKaizenColumnLocation);
        $this->toggle('dashboard_kaizen_column_head_office_input', $this->dashboardKaizenColumnHeadOfficeInput);
        $this->toggle('dashboard_kaizen_column_handle_at_location', $this->dashboardKaizenColumnHandleAtLocation);
        $this->toggle('dashboard_kaizen_column_process_step', $this->dashboardKaizenColumnProcessStep);
        $this->toggle('dashboard_kaizen_column_machine_center', $this->dashboardKaizenColumnMachineCenter);
        $this->toggle('dashboard_kaizen_column_department', $this->dashboardKaizenColumnDepartment);
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

    private function toggle($code, $val){
        $config = SystemSetting::where(['team_id'=>$this->team->id, 'code'=>$code])->first();
        $config->value = "0";
        if($val)
            $config->value = "1";
        info($config);
        $config->save();
    }

}
