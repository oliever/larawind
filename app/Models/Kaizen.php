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
                            'location_id'
                          ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public static function last()
    {
        return static::all()->last();
    }

    public function getCreatedAtAttribute($value)
    {
        return 'nine';
    }
}
