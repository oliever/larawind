<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class Kaizen extends Model //implements HasMedia
{
    use HasFactory;//, InteractsWithMedia;

    protected $fillable = [
                            'name',
                            'user_id',
                            'location_id'
                          ];


    public static function last()
    {
        return static::all()->last();
    }

    public function getCreatedAtAttribute($value)
    {
        return 'nine';
    }
}
