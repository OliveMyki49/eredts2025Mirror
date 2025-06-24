<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\redts_la_process_length;

class processLengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        redts_la_process_length::create([ 'id' => 1, 'subclass_id' => 1, 'remarks' => '33 working days & 50 min. (for relatively non-remote areas)', 'process_length_days' => 33, 'process_length_hours' => 0, 'process_length_minutes' => 50, ]);
        redts_la_process_length::create([ 'id' => 2, 'subclass_id' => 1, 'remarks' => '35 working days & 50 min. (for relatively remote areas)', 'process_length_days' => 35, 'process_length_hours' => 0, 'process_length_minutes' => 50, ]);
        redts_la_process_length::create([ 'id' => 3, 'subclass_id' => 2, 'remarks' => '33 working days & 50 min. (for relatively non-remote areas)', 'process_length_days' => 33, 'process_length_hours' => 0, 'process_length_minutes' => 50, ]);
        redts_la_process_length::create([ 'id' => 4, 'subclass_id' => 2, 'remarks' => '35 working days & 50 min. (for relatively remote areas)', 'process_length_days' => 35, 'process_length_hours' => 0, 'process_length_minutes' => 50, ]);
        redts_la_process_length::create([ 'id' => 5, 'subclass_id' => 3, 'remarks' => '16 working days & 6 hours', 'process_length_days' => 16, 'process_length_hours' => 6, 'process_length_minutes' => 0, ]);
        redts_la_process_length::create([ 'id' => 6, 'subclass_id' => 4, 'remarks' => '7 working days', 'process_length_days' => 7, 'process_length_hours' => 0, 'process_length_minutes' => 0, ]);
        redts_la_process_length::create([ 'id' => 7, 'subclass_id' => 5, 'remarks' => '2 days 4 hours and 30 minutes', 'process_length_days' => 2, 'process_length_hours' => 4, 'process_length_minutes' => 30, ]);
        redts_la_process_length::create([ 'id' => 8, 'subclass_id' => 6, 'remarks' => '2 days 4 hours and 30 minutes', 'process_length_days' => 2, 'process_length_hours' => 4, 'process_length_minutes' => 30, ]);
        redts_la_process_length::create([ 'id' => 9, 'subclass_id' => 7, 'remarks' => '2 days 4 hours and 30 minutes', 'process_length_days' => 2, 'process_length_hours' => 4, 'process_length_minutes' => 30, ]);
        redts_la_process_length::create([ 'id' => 10, 'subclass_id' => 8, 'remarks' => '2 days 4 hours and 30 minutes', 'process_length_days' => 2, 'process_length_hours' => 4, 'process_length_minutes' => 30, ]);
        redts_la_process_length::create([ 'id' => 11, 'subclass_id' => 9, 'remarks' => '2 days 4 hours and 30 minutes', 'process_length_days' => 2, 'process_length_hours' => 4, 'process_length_minutes' => 30, ]);
        redts_la_process_length::create([ 'id' => 12, 'subclass_id' => 10, 'remarks' => '2 days 4 hours and 30 minutes', 'process_length_days' => 2, 'process_length_hours' => 4, 'process_length_minutes' => 30, ]);
        redts_la_process_length::create([ 'id' => 13, 'subclass_id' => 11, 'remarks' => '4 days', 'process_length_days' => 4, 'process_length_hours' => 0, 'process_length_minutes' => 0, ]);
    }
}
