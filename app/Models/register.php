<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    use HasFactory;
    use SoftDeletes;

   protected $table = 'register';
    protected $fillable = [
        'fname',
        'mname',
        'sname',
        'email',
        'password',
        'tin_no',
        'is_admin',
        'roles',
        'position'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
       // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
