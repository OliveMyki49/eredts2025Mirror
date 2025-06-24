<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_la_process_length extends Model
{
    use HasFactory;

    protected $fillable = [
        'subclass_id',
        'remarks',
        'process_length_days',
        'process_length_hours',
        'process_length_minutes',
        'deleted_at',
    ];
}
