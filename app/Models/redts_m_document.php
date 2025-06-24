<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_m_document extends Model
{
    use HasFactory;

    protected $table = "redts_m_document";

    protected $fillable = [
        'region_id',
        'tracking_id',
        'tracking_division',
        'tracking_type',
        'tracking_date',
        'tracking_seq_no',
        'date_prepared',
        'sender',
        'subject',
        'addressee',
        'compliance_deadline',
        'classification_id',
        'offices_id',
        'marginal_note',
        'confidential',
        'transmittal',
        'remarks',
        'datetime_released',
        'attachment_details',
        'deleted',
        'deleted_at'
    ];
}
