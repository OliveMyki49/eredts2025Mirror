<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_ba_view_reqs_spec extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'user_uuid', 
        'office_id', 
        'office_uuid', 
        'deleted_at',
    ];
}
