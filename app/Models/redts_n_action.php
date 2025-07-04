<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_n_action extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'subject',
        'doc_id',
        'doc_uuid',
        'doc_no',
        'sender_client_id',
        'sender_user_id',
        'sender_user_uuid',
        'sender_type',
        'referred_by_office',
        'referred_by_office_uuid',
        'action_taken',
        'send_to_office',
        'send_to_office_uuid',
        'validated',
        'received_id',
        'received_uuid',
        'received',
        'released',
        'final_action',
        'rejected',
        'verification_date',
        'in_transit_remarks',
        'document_remarks',
        'action_remarks',
        'attachment_remarks',
        'uploaded_act',
        'downloaded',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
