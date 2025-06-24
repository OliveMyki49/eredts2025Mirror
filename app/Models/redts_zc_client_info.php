<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_zc_client_info extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'mname',
        'sname',
        'suffix',
        'sex',
        'email',
        'email_verify',
        'contact_no',
        'access_token',
        'address',
        'valid_id_front',
        'valid_id_back',
        'data_privacy_consent',
        'terms_of_reference',
        'deleted_at'
    ];
}
