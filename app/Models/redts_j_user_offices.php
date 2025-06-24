<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_j_user_offices extends Model
{
    use HasFactory;

    protected $table = "redts_j_user_offices";

    protected $fillable = [
        'user_id',
        'user_uuid',
        'offices_id',
        'offices_uuid',
        'deleted_at',
    ];
}
