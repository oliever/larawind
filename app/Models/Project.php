<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    use HasFactory;

    /* public function location()
    {
        return $this->belongsTo(Location::class);
    } */

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'project_location');
    }
}
