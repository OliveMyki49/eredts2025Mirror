<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_zb_agencies;

class agenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_zb_agencies::truncate(); //delete records

        redts_zb_agencies::create(['id' => 1, 'agency' => 'Department of Public Works and Highways', 'slug' => 'DPWH']);
        redts_zb_agencies::create(['id' => 2, 'agency' => 'Department of Transportation', 'slug' => 'DOTR']);
        redts_zb_agencies::create(['id' => 3, 'agency' => 'Department of Education', 'slug' => 'DepEd']);
        redts_zb_agencies::create(['id' => 4, 'agency' => 'Department of Agriculture', 'slug' => 'DA']);
        redts_zb_agencies::create(['id' => 5, 'agency' => 'Department of Health', 'slug' => 'DOH']);
        redts_zb_agencies::create(['id' => 6, 'agency' => 'Commission on Higher Education', 'slug' => 'CHED']);
        redts_zb_agencies::create(['id' => 7, 'agency' => 'Department of Energy', 'slug' => 'DOE']);
        redts_zb_agencies::create(['id' => 8, 'agency' => 'National Irrigation Administration', 'slug' => 'NIA']);
    }
}
