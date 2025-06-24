<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_ba_view_reqs_spec extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'office_id', 
        'deleted_at',
    ];
}
