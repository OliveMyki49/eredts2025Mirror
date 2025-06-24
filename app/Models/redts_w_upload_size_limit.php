<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redts_w_upload_size_limit extends Model
{
    use HasFactory;

    protected $table = "redts_w_upload_size_limit";

    protected $fillable = ['size'];
}
