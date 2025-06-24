<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_e_region extends Model
{
    use HasFactory;

    protected $table = 'redts_e_region';

    protected $fillable = [
        'region',
        'slug',
        'deleted_at',
    ];
}
