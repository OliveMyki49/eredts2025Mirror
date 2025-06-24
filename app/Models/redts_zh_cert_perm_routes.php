<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_zh_cert_perm_routes extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_class_id',
        'route',
        'deleted_at',
    ];
}
