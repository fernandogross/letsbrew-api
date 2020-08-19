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

    public const HOP_TYPES = [
        'Bittering' => 1,
        'Aroma' => 2,
    ];

    public const HOP_FORMS = [
        'Pellet' => 1,
        'Whole' => 2,
        'Plug' => 3,
    ];
}
