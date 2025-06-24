<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_e_region;

class regionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_e_region::create(['id' => 1, 'region' => 'National Capital Region', 'slug' => 'NCR',]);
        redts_e_region::create(['id' => 2, 'region' => 'Region I', 'slug' => 'R1',]);
        redts_e_region::create(['id' => 3, 'region' => 'Region II', 'slug' => 'R2',]);
        redts_e_region::create(['id' => 4, 'region' => 'Region III', 'slug' => 'R3',]);
        redts_e_region::create(['id' => 5, 'region' => 'Calabarzon', 'slug' => 'R4A',]);
        redts_e_region::create(['id' => 6, 'region' => 'Mimaropa', 'slug' => 'R4B',]);
        redts_e_region::create(['id' => 7, 'region' => 'Region V', 'slug' => 'R5',]);
        redts_e_region::create(['id' => 8, 'region' => 'Region VI', 'slug' => 'R6',]);
        redts_e_region::create(['id' => 9, 'region' => 'Region VII', 'slug' => 'R7',]);
        redts_e_region::create(['id' => 10, 'region' => 'Region VIII', 'slug' => 'R8',]);
        redts_e_region::create(['id' => 11, 'region' => 'Region IX', 'slug' => 'R9',]);
        redts_e_region::create(['id' => 12, 'region' => 'Region X', 'slug' => 'R10',]);
        redts_e_region::create(['id' => 13, 'region' => 'Region XI', 'slug' => 'R11',]);
        redts_e_region::create(['id' => 14, 'region' => 'Region XII', 'slug' => 'R12',]);
        redts_e_region::create(['id' => 15, 'region' => 'Caraga Administrative Region', 'slug' => 'CAR',]);
        redts_e_region::create(['id' => 16, 'region' => 'Cordillera Administrative Region', 'slug' => 'CAR',]);
        redts_e_region::create(['id' => 17, 'region' => 'Central Office', 'slug' => 'CO',]);
    }
}
