<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function kaizens(){
        return $this->hasMany(Kaizen::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
