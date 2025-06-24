<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_ee_classification;

class classificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // redts_ee_classification::truncate();
        redts_ee_classification::create(['id' => 1, 'description' => 'Tree Cutting Permit (Private Land)', 'slug' => 'TCPPrL']);
        redts_ee_classification::create(['id' => 2, 'description' => 'Tree Cutting Permit (Public Land)', 'slug' => 'TCPPbL']);
        redts_ee_classification::create(['id' => 3, 'description' => 'Chainsaw Registration', 'slug' => 'CsR']);
        redts_ee_classification::create(['id' => 6, 'description' => 'Gratuitous Permit', 'slug' => 'GP']);
    }
}
