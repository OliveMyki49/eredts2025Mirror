<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_zb_agencies extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency',
        'slug',
        'deleted_at',
    ];
}
