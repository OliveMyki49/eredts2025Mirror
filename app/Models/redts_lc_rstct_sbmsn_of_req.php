<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_lc_rstct_sbmsn_of_req extends Model
{
    use HasFactory;

    protected $fillable = [
        'subclass_id',
        'rstd_office_id',
        'deleted_at',
    ];
}
