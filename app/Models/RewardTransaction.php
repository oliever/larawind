<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardTransaction extends Model
{
    use HasFactory;

    public function employee(){
        return $this->hasOne(Employee::class);
    }

    public function rewardProgram(){
        return $this->hasOne(RewardProgram::class, 'reward_program_id');
    }
}
