<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_p_logs extends Model
{
    use HasFactory;

    protected $table = "redts_p_logs";

    protected $fillable = [
        'user',
        'action_taken',
        'ip_address',
        'city',
        'region',
        'country',
        'latitude',
        'longitude',
        'organization',
        'zip_code',
        'date_time',
        'deleted_at',
    ];
}
