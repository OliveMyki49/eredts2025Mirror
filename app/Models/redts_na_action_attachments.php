<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_na_action_attachments extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_id',
        'action_uuid',
        'doc_no',
        'doc_uuid',
        'remarks',
        'file_path',
        'file_name',
        'file_link',
        'public',
        'uploaded',
        'downloaded',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
