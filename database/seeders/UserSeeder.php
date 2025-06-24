<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add user here
        User::create([
            'id' => 1,
            'username' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'email' => 'admin@admin.com',
            'access_id' => 1,
            'status' => 1,
            'remember_token' => 0,
            'admin_delete' => 1,
        ]);
    }
}
