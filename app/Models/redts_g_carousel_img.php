<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_g_carousel_img extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'file_name',
        'deleted_at',
    ];
}
