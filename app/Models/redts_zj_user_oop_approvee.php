<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_zj_user_oop_approvee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'approvee_fullname',
        'approvee_position',
        'deleted_at',
    ];
}
