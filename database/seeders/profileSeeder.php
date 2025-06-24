<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_d_profile;

class profileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //redts_d_profile
        redts_d_profile::create([
            'user_id' => 1, // Replace with the actual user_id
            'fname' => 'Olive',
            'mname' => 'Myki',
            'sname' => 'Barcelon',
            'suffix' => '',
            'position' => 'Manager',
            'image' => '', // Replace with the actual image path
        ]);
    }
}
