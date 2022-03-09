<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'team_id',
        'name'
    ];

    public function kaizens()
    {
        return $this->belongsToMany(Kaizen::class,  'kaizen_department' );
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class,  'kaizen_department' );
    }
}
