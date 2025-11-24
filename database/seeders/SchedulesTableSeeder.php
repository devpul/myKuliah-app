<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesTableSeeder extends Seeder
{
    public function run()
    {
        $schedules = [
            ['subject_id' => 1, 'day_of_week' => 1, 'start_time' => '08:00', 'end_time' => '10:00', 'room' => 'Lab 301'],
            ['subject_id' => 2, 'day_of_week' => 1, 'start_time' => '10:30', 'end_time' => '12:00', 'room' => 'Ruang 204'],
            ['subject_id' => 3, 'day_of_week' => 2, 'start_time' => '08:00', 'end_time' => '09:30', 'room' => 'Lab Fisika'],
            ['subject_id' => 4, 'day_of_week' => 2, 'start_time' => '13:00', 'end_time' => '14:30', 'room' => 'Ruang 105'],
            ['subject_id' => 5, 'day_of_week' => 3, 'start_time' => '08:00', 'end_time' => '10:00', 'room' => 'Lab 302'],
            ['subject_id' => 1, 'day_of_week' => 3, 'start_time' => '13:00', 'end_time' => '15:00', 'room' => 'Lab 301'],
            ['subject_id' => 2, 'day_of_week' => 4, 'start_time' => '10:00', 'end_time' => '12:00', 'room' => 'Ruang 204'],
            ['subject_id' => 3, 'day_of_week' => 5, 'start_time' => '08:00', 'end_time' => '09:30', 'room' => 'Lab Fisika'],
        ];

        foreach ($schedules as $s) {
            DB::table('schedules')->insert(array_merge($s, [
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
