<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_d_profile extends Model
{
    use HasFactory;

    protected $table = 'redts_d_profile';

    protected $fillable = [
        'user_id',
        'user_uuid',
        'fname',
        'mname',
        'sname',
        'suffix',
        'position',
        'image',
        'deleted_at',
    ];
}
