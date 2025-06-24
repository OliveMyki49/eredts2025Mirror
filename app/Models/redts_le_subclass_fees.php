<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_le_subclass_fees extends Model
{
    use HasFactory;

    protected $fillable = [
        'subclass_id',
        'item_name',
        'fee_amount',
        'cost_grouping',
        'deleted_at',
    ];
}
