<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\RewardTransaction;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    use SearchTrait;

    protected $fillable = [
        'team_id', 'name', 'location_id', 'level'
    ];

    public function rewardTransactions(){
        return $this->hasMany(RewardTransaction::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }
}

abstract class EmployeeLevels
{
    const super_admin = "super_admin";
    const headoffice_admin = "headoffice_admin";
    const headoffice_staff = "headoffice_staff";
    const location_manager = "location_manager";
    const location_staff = "location_staff";
}
