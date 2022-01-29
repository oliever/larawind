<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $casts = [
        'start' => 'date:Y-m-d',
        'end' => 'date:Y-m-d'
    ];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'project_location');
    }

    public function affectedAreas()//
    {
        return $this->belongsToMany(AffectedArea::class, 'project_affected_area');
    }

    public function departments()//
    {
        return $this->belongsToMany(Department::class, 'project_department');
    }

    public function manager(){
        return $this->hasOne(Employee::class, 'id', 'manager_id');
    }
    public function sponsor(){
        return $this->hasOne(Employee::class, 'id', 'sponsor_id');
    }
    public function champion(){
        return $this->hasOne(Employee::class, 'id', 'champion_id');
    }
    public function members()
    {
        return $this->belongsToMany(Employee::class, 'project_employee');
    }
    public function approvedManager(){
        return $this->hasOne(Employee::class, 'id', 'approved_manager_id');
    }
    public function approvedSponsor(){
        return $this->hasOne(Employee::class, 'id', 'approved_sponsor_id');
    }
    public function approvedChampion(){
        return $this->hasOne(Employee::class, 'id', 'approved_champion_id');
    }

    public function actuAlHoursValidator(){
        return $this->hasOne(Employee::class, 'id', 'hours_actual_validated_id');
    }
    public function actualSavingsValidator(){
        return $this->hasOne(Employee::class, 'id', 'savings_actual_validated_id');
    }
}
