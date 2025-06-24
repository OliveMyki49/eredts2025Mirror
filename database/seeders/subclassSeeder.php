<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_l_sub_class;

class subclassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // redts_l_sub_class::truncate(); //delete all row
        redts_l_sub_class::create(['id' => 1, 'classification_id' => 1, 'description' => 'Private Land Timber Permit', 'full_description' => 'PLTP serves as the official authority to cut, gather and utilize naturally grown trees within private or titled lands.', 'slug' => 'PLTP', 'classification_type' => 'highly_technical']);
        redts_l_sub_class::create(['id' => 2, 'classification_id' => 1, 'description' => 'Special Private Land Timber Permit', 'full_description' => 'SPLTP serves as the official authority to cut, gather and utilize naturally grown trees within private or titled lands.', 'slug' => 'SPLTP', 'classification_type' => 'highly_technical']);
        redts_l_sub_class::create(['id' => 3, 'classification_id' => 2, 'description' => 'Tree Cutting Permit for Public Places', 'full_description' => 'This Permit serves as proof of authorization for the removal/cutting of trees in public places (Plaza, Public Parks, School Premises or Political Subdivisions for purposes of public safety).', 'slug' => 'TCPP', 'classification_type' => 'highly_technical']);
        redts_l_sub_class::create(['id' => 4, 'classification_id' => 2, 'description' => 'Tree Cutting and/or Earth Balling Permit', 'full_description' => 'This Permit serves as proof of authorization for the removal/cutting and/or relocation of trees affected by projects of the National Government Agencies (DPWH, DOTr, DepEd, Da, DOH, CHED, DOE and NIA)', 'slug' => 'TCEBP', 'classification_type' => 'complex']);
        redts_l_sub_class::create(['id' => 5, 'classification_id' => 3, 'description' => 'Chainsaw Registration for Tenure Holders', 'full_description' => 'Holder of a Subsisting Tenurial Instrument', 'slug' => 'CsRegHSTI', 'classification_type' => 'simple']);
        redts_l_sub_class::create(['id' => 6, 'classification_id' => 3, 'description' => 'Chainsaw Registration for Orchard/Fruit or Industrial Tree Farmer', 'full_description' => 'Orchard/Fruit Tree Farmer or Industrial Tree Farmer', 'slug' => 'CsRegITF', 'classification_type' => 'simple']);
        redts_l_sub_class::create(['id' => 7, 'classification_id' => 3, 'description' => 'Chainsaw Registration for Licensed Processor', 'full_description' => 'Licensed Wood Processors', 'slug' => 'CsRegLWP', 'classification_type' => 'simple']);
        redts_l_sub_class::create(['id' => 8, 'classification_id' => 3, 'description' => 'Chainsaw Registration for Govt. and controlled Corporations', 'full_description' => 'Government-owned and controlled corporations', 'slug' => 'CsRegG', 'classification_type' => 'simple']);
        redts_l_sub_class::create(['id' => 9, 'classification_id' => 3, 'description' => 'Other Entity Chainsaw Registration', 'full_description' => 'Other persons/entities', 'slug' => 'CsRegOE', 'classification_type' => 'simple']);
        redts_l_sub_class::create(['id' => 10, 'classification_id' => 3, 'description' => 'Chainsaw Reg. Renewal', 'full_description' => 'Chainsaw Registration Renewal', 'slug' => 'CsRrnwl', 'classification_type' => 'simple']);
        redts_l_sub_class::create(['id' => 11, 'classification_id' => 6, 'description' => 'Wildlife Gratuitous Permit', 'full_description' => '', 'slug' => 'WGP', 'classification_type' => 'highly_technical']);
    }
}
