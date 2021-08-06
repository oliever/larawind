<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapidSolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'kaizen_id',
        'description',
        'who',
        'when',
        'done',
      ];
}
