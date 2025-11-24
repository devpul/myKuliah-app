<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesTableSeeder extends Seeder
{
    public function run()
    {
        $activities = [
            ['name' => 'Rapat BEM', 'category' => 'organization', 'date' => '2025-11-11', 'time' => '16:00', 'location' => 'Aula Utama', 'description' => 'Rapat koordinasi'],
            ['name' => 'Latihan Basket', 'category' => 'sport', 'date' => '2025-11-12', 'time' => '17:00', 'location' => 'GOR Kampus', 'description' => 'Latihan rutin'],
            ['name' => 'Part-time Coding', 'category' => 'work', 'date' => '2025-11-13', 'time' => '14:00', 'location' => 'Remote', 'description' => 'Freelance project'],
            ['name' => 'Seminar AI', 'category' => 'seminar', 'date' => '2025-11-15', 'time' => '09:00', 'location' => 'Auditorium', 'description' => 'Guest lecture ML'],
            ['name' => 'Volunteer Teaching', 'category' => 'volunteer', 'date' => '2025-11-16', 'time' => '13:00', 'location' => 'SD Harapan', 'description' => 'Mengajar programming'],
            ['name' => 'Badminton Tournament', 'category' => 'sport', 'date' => '2025-11-18', 'time' => '08:00', 'location' => 'GOR Kampus', 'description' => 'Turnamen fakultas'],
        ];

        foreach ($activities as $a) {
            DB::table('activities')->insert(array_merge($a, [
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
