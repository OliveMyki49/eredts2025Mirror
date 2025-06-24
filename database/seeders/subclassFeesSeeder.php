<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_le_subclass_fees;

class subclassFeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_le_subclass_fees::create(['id' => 1, 'subclass_id' => 1, 'item_name' => 'PENRO / CENRO Sub-Total', 'fee_amount' => 86.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 2, 'subclass_id' => 1, 'item_name' => 'Certification Fee', 'fee_amount' => 50.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 3, 'subclass_id' => 1, 'item_name' => 'Application Oath Fee', 'fee_amount' => 36.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 4, 'subclass_id' => 1, 'item_name' => 'Inventory Fee per ha', 'fee_amount' => 1200.00, 'cost_grouping' => 'a1',]);

        redts_le_subclass_fees::create(['id' => 5, 'subclass_id' => 2, 'item_name' => 'PENRO / CENRO Sub-Total', 'fee_amount' => 86.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 6, 'subclass_id' => 2, 'item_name' => 'Certification Fee', 'fee_amount' => 50.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 7, 'subclass_id' => 2, 'item_name' => 'Application Oath Fee', 'fee_amount' => 36.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 8, 'subclass_id' => 2, 'item_name' => 'Inventory Fee per ha', 'fee_amount' => 1200.00, 'cost_grouping' => 'a1',]);

        redts_le_subclass_fees::create(['id' => 9, 'subclass_id' => 3, 'item_name' => 'Certification Fee', 'fee_amount' => 50.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 10, 'subclass_id' => 3, 'item_name' => 'Application Oath Fee', 'fee_amount' => 36.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 11, 'subclass_id' => 3, 'item_name' => 'Inventory Fee per Ha', 'fee_amount' => 1200.00, 'cost_grouping' => 'a1',]);

        redts_le_subclass_fees::create(['id' => 12, 'subclass_id' => 4, 'item_name' => 'Certification Fee', 'fee_amount' => 50.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 13, 'subclass_id' => 4, 'item_name' => 'Application Oath Fee', 'fee_amount' => 36.00, 'cost_grouping' => 'a1',]);

        redts_le_subclass_fees::create(['id' => 14, 'subclass_id' => 5, 'item_name' => 'Registration Fee', 'fee_amount' => 500.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 15, 'subclass_id' => 6, 'item_name' => 'Registration Fee', 'fee_amount' => 500.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 16, 'subclass_id' => 7, 'item_name' => 'Registration Fee', 'fee_amount' => 500.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 17, 'subclass_id' => 8, 'item_name' => 'Registration Fee', 'fee_amount' => 500.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 18, 'subclass_id' => 9, 'item_name' => 'Registration Fee', 'fee_amount' => 500.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 19, 'subclass_id' => 10, 'item_name' => 'Registration Fee', 'fee_amount' => 500.00, 'cost_grouping' => 'a1',]);

        redts_le_subclass_fees::create(['id' => 20, 'subclass_id' => 11, 'item_name' => '1-50 Individuals', 'fee_amount' => 50.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 21, 'subclass_id' => 11, 'item_name' => '50-100 Individuals', 'fee_amount' => 100.00, 'cost_grouping' => 'a1',]);
        redts_le_subclass_fees::create(['id' => 22, 'subclass_id' => 11, 'item_name' => 'More than 100 Individuals', 'fee_amount' => 500.00, 'cost_grouping' => 'a1',]);
    }
}
