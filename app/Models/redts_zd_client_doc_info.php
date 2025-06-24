<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_zd_client_doc_info extends Model
{
    use HasFactory;

    protected $table = 'redts_zd_client_doc_infos';

    protected $fillable = [
        'id',
        'uuid',
        'doc_no',
        'application_type_id',
        'application_type_uuid',
        'transaction_type_id',
        'transaction_type_uuid',
        'agency',
        'client_id',
        'class_id',
        'class_uuid',
        'class_slug',
        'subclass_id',
        'subclass_slug',
        'remarks',
        'validated',
        'doc_date',
        'compliance_deadline',
        'deleted_at',
    ];
}
