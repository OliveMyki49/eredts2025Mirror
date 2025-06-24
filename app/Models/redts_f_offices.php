<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_f_offices extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'region_id',
        'slug',
        'office',
        'full_office_name',
        'office_type',
        'mother_unit',
        'header_office_title',
        'email',
        'tel_no',
        'cp_no',
        'office_address',
        'deleted_at',
    ];
}
