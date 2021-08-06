<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapidCause extends Model
{
    use HasFactory;

    protected $fillable = [
        'kaizen_id',
        'description',
        'findings',
        'root_cause',
      ];
}
