<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_l_sub_class extends Model
{
    use HasFactory;

    protected $table = "redts_l_sub_class";

    protected $fillable = [
        'classification_id',
        'description',
        'slug',
        'classification_type',
        'deleted_at'
    ];
}
