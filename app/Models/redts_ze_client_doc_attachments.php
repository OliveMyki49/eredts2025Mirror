<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_ze_client_doc_attachments extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_info_id',
        'doc_info_uuid',
        'req_id',
        'app_form_no',
        'req_slug',
        'file_path',
        'file_name',
        'file_link',
        'text_input',
        'attachment_type',
        'deleted_at',
    ];
}
