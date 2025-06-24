<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_za_transaction_type;

class transactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_za_transaction_type::create(['id' => 1,'transaction' => 'Government to Government','slug' => 'G2G']);
        redts_za_transaction_type::create(['id' => 2,'transaction' => 'Government to Business','slug' => 'G2B']);
        redts_za_transaction_type::create(['id' => 3,'transaction' => 'Government to Citizen','slug' => 'G2C']);
    }
}
