<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_nc_act_seen extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_id',
        'action_uuid',
        'deleted_at',
    ];
}
