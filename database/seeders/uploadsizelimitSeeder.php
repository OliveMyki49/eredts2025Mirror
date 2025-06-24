<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_w_upload_size_limit;

class uploadsizelimitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_w_upload_size_limit::create([
            'id' => 1,
            'size' => 10000000,
        ]);
    }
}
