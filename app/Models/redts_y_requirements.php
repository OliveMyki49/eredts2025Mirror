<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_y_requirements extends Model
{
    use HasFactory;

    protected $table = "redts_y_requirements";

    protected $fillable = [
        'subclass_id',
        'title',
        'slug',
        'description',
        'attachment_type',
        'requirement_type',
        'deleted_at',
    ];
}
