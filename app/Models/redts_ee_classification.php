<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_ee_classification extends Model
{
    use HasFactory;

    protected $table = "redts_ee_classification";

    protected $fillable = [
        'description',
        'slug',
        'classification',
        'deleted_at'
    ];
}
