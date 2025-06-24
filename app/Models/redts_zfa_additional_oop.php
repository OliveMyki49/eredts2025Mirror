<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_zfa_additional_oop extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_id',
        'creator_id',
        'header_title',
        'header_address',
        'or_no',
        'or_no_dated',
        'pay_amount',
        'purpose',
        'clerk_fullname',
        'prepared_by_position',
        'approving_remarks',
        'approving_fullname',
        'approving_position',
        'per_bill_no',
        'per_bill_no_dated',
        'deleted_at',
    ];
}
