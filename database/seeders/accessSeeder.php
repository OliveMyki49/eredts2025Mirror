<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_a_access;

class accessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_a_access::create(['id' => 1, 'type' => 'Administrator']);
        redts_a_access::create(['id' => 2, 'type' => 'DTS Administrator']);
        redts_a_access::create(['id' => 3, 'type' => 'Division Chief']);
        redts_a_access::create(['id' => 4, 'type' => 'Receiving Clerk']);
        redts_a_access::create(['id' => 5, 'type' => 'Receiving and Releasing Clerk']);
        redts_a_access::create(['id' => 6, 'type' => 'Releasing Clerk']);
        redts_a_access::create(['id' => 7, 'type' => 'Regional Director']);
        redts_a_access::create(['id' => 8, 'type' => 'Assistant Regional Director for Technical Services']);
        redts_a_access::create(['id' => 9, 'type' => 'Validator']);
        redts_a_access::create(['id' => 10, 'type' => 'Processor']);
        redts_a_access::create(['id' => 11, 'type' => 'Accounting Officer']);
        redts_a_access::create(['id' => 12, 'type' => 'Credit Officer']);
    }
}
