<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_z_applicant_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'transaction_uuid',
        'applicant',
        'deleted_at'
    ];
}
