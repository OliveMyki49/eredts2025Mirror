<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_a_access extends Model
{
    use HasFactory;

    protected $table = 'redts_a_accesss';

    protected $fillable = [
        'id',
        'type',
        'deleted_at',
    ];
}
