<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_z_applicant_type;

class applicantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_z_applicant_type::create(['id' => 1, 'transaction_id' => 1, 'applicant' => 'Government Agencies', 'deleted_at' => NULL]);
        redts_z_applicant_type::create(['id' => 2, 'transaction_id' => 1, 'applicant' => 'Local Government Units', 'deleted_at' => '2023-10-25']);
        redts_z_applicant_type::create(['id' => 3, 'transaction_id' => 2, 'applicant' => 'Business', 'deleted_at' => NULL]);
        redts_z_applicant_type::create(['id' => 4, 'transaction_id' => 3, 'applicant' => 'School', 'deleted_at' => '2023-10-25']);
        redts_z_applicant_type::create(['id' => 5, 'transaction_id' => 3, 'applicant' => 'Citizen', 'deleted_at' => NULL]);
        
    }
}
