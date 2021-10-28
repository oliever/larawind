<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /* public function kaizens(){
        return $this->hasMany(Kaizen::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    } */
    public function children()
    {
        return $this->hasMany(self::class, 'area_id', 'id');
    }

    public function kaizens()
    {
        return $this->belongsToMany(Kaizen::class,  'kaizen_location' );
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class,  'project_location' );
    }
}
