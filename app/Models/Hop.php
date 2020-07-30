<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hop extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'origin',
        'price',
        'type',
        'form',
        'alpha',
        'beta',
        'characteristics',
    ];
}
