<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_za_transaction_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction',
        'slug',
        'deleted_at',
    ];
}
