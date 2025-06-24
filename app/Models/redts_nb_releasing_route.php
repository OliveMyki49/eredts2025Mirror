<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_nb_releasing_route extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin_act',
        'origin_act_uuid',
        'released_act',
        'released_act_uuid',
        'deleted_at',
    ];
}
