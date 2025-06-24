<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_j_user_offices;

class user_officesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_j_user_offices::create(['id' => 1, 'user_id' => 1, 'offices_id' => 5]);
    }
}
