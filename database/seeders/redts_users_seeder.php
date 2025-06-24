<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class redts_users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'olivemyki49@gmail.com',
            'password' => bcrypt('admin123'),
            'email' => 'olivemyki49@gmail.com',
            'access_id' => '1',
            'status' => '1',
            'remember_token' => '0',
            'admin_delete' => '1',
            'new' => '1',
            'deleted' => '0',
        ]);
    }
}
