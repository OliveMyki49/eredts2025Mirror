<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_zi_origin_office extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_uuid',
        'doc_id',
        'doc_uuid',
        'origin_office_id',
        'origin_office_uuid',
        'uploaded',
        'downloaded',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
