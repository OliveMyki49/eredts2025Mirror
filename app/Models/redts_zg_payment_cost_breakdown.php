<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_zg_payment_cost_breakdown extends Model
{
    use HasFactory;

    protected $fillable = [
        'doc_id',
        'ofp_id',
        'cost_breakdown_amount',
        'cost_breakdown',
        'deleted_at',
    ];
}
