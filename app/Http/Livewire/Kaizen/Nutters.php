<?php

namespace App\Http\Livewire\Kaizen;


use DateTime;
use Carbon\Carbon;

use Laravel\Jetstream\Jetstream;
use Livewire\Component;

use App\Models\Kaizen;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Translation;
use App\Models\AffectedArea;
use App\Services\RewardService;
use App\Notifications\KaizenCreated;

class Nutters extends Component
{
    public $t;//translations
    public $employee;
    public $kaizen;
    //public $stores;
    public $employees;
    public $affectedAreas = [];
    public $departments = [];
    public $machineCenters = [];
    public $processSteps = [];
    public $isRapid = false;
    public $isJustDoIt = true;
    public $hasBeforeAfter = false;
    public $shown = false;

    public $dateAssigned;

    public $isSearchUserModalOpen = false;
    public $isSearchLocationModalOpen = false;
    public $selectedUsers = [];
    public $members = [];
    public $selectedLocations = [];

    public $canApprove = false;
    public $protected = true;
    public $protectReason = '';

    public $completion  = 0;

    protected $listeners = [
        'employeesCheckboxUpdated', 
        'locationsCheckboxUpdated', 
        'photoUploaded', 
        'affectedAreasCheckboxUpdated', 
        'departmentsCheckboxUpdated', 
        'machineCentersCheckboxUpdated',
        'processStepsCheckboxUpdated'];

    protected $rules = [
        'kaizen.name' => 'required|min:5',
        'kaizen.date_assigned' => '',
        'kaizen.all_locations' => '',
        'kaizen.other_affected_area' => '',
        'kaizen.reason' => '',
        'kaizen.problem' => '',
        'kaizen.completion' => '',
        'kaizen.rapid' => '',
        'kaizen.just_do_it' => '',
        'kaizen.head_office_input' => '',
        'kaizen.head_office_comment' => '',
        'kaizen.dollar_value' => '',//HO user only
        'kaizen.savings' => '',//HO user only
        'kaizen.hours_saved' => '',//HO user only
        'kaizen.causes' => '',
        'kaizen.handled_at_location' => '',
        'kaizen.solution' => '',
        'kaizen.expected_result' => '',
        'kaizen.comments_before' => '',
        'kaizen.comments_after' => '',
        'kaizen.benefits' => '',
        'kaizen.rapid_problem' => '',

        'kaizen.validating_employee_id' => '',
        'kaizen.approving_employee_id' => '',

        'kaizen.custom_field_01' => '',
        'kaizen.custom_field_02' => '',
        'kaizen.custom_field_03' => '',
        'kaizen.custom_field_04' => '',

    ];

    public function mount($employee = null, Kaizen $kaizen = null)
    {
        
        //info(auth()->user()->currentTeam->id);
        $this->t = Translation::where(['team_id'=> auth()->user()->currentTeam->id,'section'=>'kaizen_general'])->get()->keyBy('field')->toArray();
      // info($this->t);
        $this->employee = $employee;

        $this->kaizen = $kaizen;
        info("--Nutters::mount kaizen-- " . $this->kaizen->id);
        $locationLocked = Location::where('id', auth()->user()->location_locked)->first();

        $this->employees = Employee::get();
        if($locationLocked){
            $this->employees = $locationLocked->employees()->get();//Employee::where('location_id', $locationLocked->id)->get();
        }

        if(!isset($this->kaizen['id'])){
            $this->kaizen = new Kaizen();
            $this->kaizen->temp_id = bin2hex(random_bytes(10));
            $this->isJustDoIt = true;
            $this->isRapid = false;
            $this->kaizen->rapid = false;

            $this->kaizen->just_do_it = true;
            $this->kaizen->head_office_input = false;
            $this->kaizen->handled_at_location = false;
            $this->hasBeforeAfter = false;

            $this->protected = false;
        }
        else{
            //info(date('Y-m-d', strtotime($this->kaizen->date_assigned)));
            if($this->kaizen->date_assigned)
                $this->dateAssigned = date('Y-m-d', strtotime($this->kaizen->date_assigned));
            $this->isJustDoIt = $this->kaizen->just_do_it;
            $this->isRapid = $this->kaizen->rapid;
            $this->hasBeforeAfter = $this->kaizen->before_after;

            $this->selectedLocations = $this->kaizen->locations()->get();
            if($this->kaizen->all_locations)
                $this->selectedLocations = Location::where('team_id',auth()->user()->currentTeam->id)->where('area_id','>','0')->get();
            //$this->selectedUsers = $this->kaizen->users()->get();
            $this->members = $this->kaizen->members()->get();

            $this->affectedAreas = $this->kaizen->affectedAreas()->get();

            $this->departments = $this->kaizen->departments()->get();

            $this->machineCenters = $this->kaizen->machineCenters()->get();

            $this->processSteps = $this->kaizen->processSteps()->get();

            $this->setProtected();

            if($this->kaizen->rapid){
                //if(auth()->user()->level == "headoffice_staff" || auth()->user()->level == "headoffice_admin")
                if(auth()->user()->level == "headoffice_admin")
                    $this->canApprove = true;
            }else if($this->kaizen->just_do_it){
                if(auth()->user()->level == "location_manager")
                    $this->canApprove = true;
            }

        }
    }

    private function setProtected(){
        //check if admin or manager
        if(auth()->user()->level == "headoffice_admin" || auth()->user()->level == "super_admin" || auth()->user()->level == "location_manager")
            $this->protected = false;
        else{
            /* staff level (ho and location) */
            $this->protectReason = "";

            //check employee selected is the creator
            if($this->kaizen->employee_id == $this->employee->id){
                $this->protected = false;
            }else{
                $this->protectReason = "Staff level employee and not the creator.";
            }
                
            //check employee selected is a member
            foreach ($this->kaizen->members()->get() as $key => $employee) {
                if($this->employee->id == $employee->id){
                    $this->protected = false;
                    break;
                }
            }
            if($this->protected)
                $this->protectReason = "Staff level employee and not the creator nor a member.";//should absolutely be the last reason to protect
        }            

        
        

        

        info("kaizen {$this->kaizen->id} protected: {$this->protected}");
        if(!$this->protected)
            info($this->protectReason);
        /* info(auth()->user()->level .": ".auth()->user()->level);
        info("selected employee: {$this->employee->name} ({$this->employee->id})");
        info($this->kaizen->members()->select('id')->get()); */
    }

    public function photoUploaded(){
        info('photoUploaded');
    }
    public function locationsCheckboxUpdated($locations){
        $this->selectedLocations = $locations;
    }
    public function employeesCheckboxUpdated($members){
        $this->members = $members;
    }

    public function affectedAreasCheckboxUpdated($affectedAreas){
        $this->affectedAreas = $affectedAreas;
    }

    public function departmentsCheckboxUpdated($departments){
        $this->departments = $departments;
    }

    public function machineCentersCheckboxUpdated($machineCenters){
        $this->machineCenters = $machineCenters;
    }

    public function processStepsCheckboxUpdated($processSteps){
        $this->processSteps = $processSteps;
    }

    public function saveAsDraft(){
        $this->save();
    }

    public function submitKaizen(){
        $this->save();
    }

    private function save()
    {
        $this->kaizen->rapid = $this->isRapid;
        $this->kaizen->just_do_it = $this->isJustDoIt;
        $this->kaizen->team_id = auth()->user()->currentTeam->id;
        $this->kaizen->user_id =  auth()->user()->id;
        /* if(auth()->user()->shared){
            $this->kaizen->employee_id = $this->employee->id;
        } */
        $this->kaizen->employee_id = $this->employee->id;
        info($this->employee);

        $this->kaizen->head_office_input = $this->kaizen->head_office_input ? true : false;
        $this->kaizen->handled_at_location = $this->kaizen->handled_at_location ? true : false;
        $this->kaizen->before_after = $this->hasBeforeAfter;

        if($this->dateAssigned)
            $this->kaizen->date_assigned = date('Y-m-d', strtotime($this->dateAssigned));

        if(!$this->kaizen->completion)
            $this->kaizen->completion = 0;

        $this->validate();

        // Execution doesn't reach here if validation fails.
        $this->kaizen->custom_field_01_label = t('kaizen_custom_field','custom_field_01');
        $this->kaizen->custom_field_02_label = t('kaizen_custom_field','custom_field_02');
        $this->kaizen->custom_field_03_label = t('kaizen_custom_field','custom_field_03');
        $this->kaizen->custom_field_04_label = t('kaizen_custom_field','custom_field_04');

        $this->kaizen->posted = Carbon::now();

        $this->kaizen->all_locations = 0;
        if(auth()->user()->currentTeam->id != 2)
            if(count($this->selectedLocations) == count(Location::where('team_id',auth()->user()->currentTeam->id)->where('area_id', null)->with('children')->get()[0]->children))
                $this->kaizen->all_locations = 1;



            //dd($this->selectedLocations);
            //info(count($this->selectedLocations));
            //info(count(Location::where('area_id', null)->with('children')->get()[0]->children));
            info($this->kaizen->completion);
        $this->kaizen->save();

        $this->kaizen->locations()->sync($this->selectedLocations);


        if($this->kaizen->all_locations)
            $this->kaizen->locations()->sync([]);//empty upon saving

        $this->kaizen->members()->sync($this->members);

        $this->kaizen->affectedAreas()->sync($this->affectedAreas);

        info("saving departments...");
        info($this->departments);
        $this->kaizen->departments()->sync($this->departments);

        $this->kaizen->machineCenters()->sync($this->machineCenters);

        $this->kaizen->processSteps()->sync($this->processSteps);

        info('---nutters_kaizen_saved---');
        info($this->kaizen);

        session()->flash('success', ['title'=>'Kaizen Suggestion Form Saved!' , 'subtitle'=>'ID: '. str_pad($this->kaizen->id, 4,"0", STR_PAD_LEFT)]);

        $this->emit('saved');//to display action message
        $this->emit('saved');//to display action message
        $this->emit('kaizenAdded', $this->kaizen->id);//Listeners: 1. UploadPhotos

        /* $message = 'Kaizen Form saved as draft: ' . $this->kaizen->id;
        if($this->kaizen->posted)
            $message = 'Kaizen Form saved as Project: ' . $this->kaizen->id; */

       //return redirect()->to('/kaizen/' . $this->kaizen->id);

       //auth()->user()->notify(new KaizenCreated($this->kaizen));
       $this->emit('saved');//to display action message
    }

    public function approve(){
        $this->kaizen->approved = Carbon::now();
        $this->kaizen->approved_by = auth()->user()->id;
        $this->kaizen->save();
        RewardService::kaizenApproved($this->kaizen);
        $this->emit('saved');//to display action message
    }

    public function createBeforeAfter()
    {
        $this->hasBeforeAfter = true;
        $this->kaizen->before_after = $this->hasBeforeAfter;
        $this->kaizen->save();
    }
    public function render()
    {
        $this->kaizen->completion = intval($this->kaizen->completion);
        info($this->kaizen->completion);
        $this->completion = 60;
        return view('livewire.kaizen.nutters');
    }


}
