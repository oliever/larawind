<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

/* Defaults as Kaizen Suggestion Form */
class Kaizen extends Model //implements HasMedia
{
    use SoftDeletes;
    use HasFactory;//, InteractsWithMedia;

    protected $fillable = [
                            'name',
                            'user_id',
                          ];

    /* public function location()
    {
        return $this->belongsTo(Location::class);
    } */

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'kaizen_location');
    }

    public function users()//members
    {
        return $this->belongsToMany(User::class, 'kaizen_user');
    }

    public function employee()//creator
    {
        return $this->belongsTo(Employee::class);
    }

    public function members()//
    {
        return $this->belongsToMany(Employee::class, 'kaizen_employee');
    }

    public function affectedAreas()//
    {
        return $this->belongsToMany(AffectedArea::class, 'kaizen_affected_area');
    }

    public function departments()//
    {
        return $this->belongsToMany(Department::class, 'kaizen_department');
    }

    public function machineCenters()//
    {
        return $this->belongsToMany(MachineCenter::class, 'kaizen_machinecenter');
    }

    public function processSteps()//
    {
        return $this->belongsToMany(ProcessStep::class, 'kaizen_processstep');
    }

    public static function last()
    {
        return static::all()->last();
    }



    /* public function getCreatedAtAttribute($value)
    {
        return 'nine';
    } */
}
