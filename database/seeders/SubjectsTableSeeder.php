<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['code' => 'CS101', 'name' => 'Algoritma & Pemrograman', 'lecture_name' => 'Dr. Budi', 'credits' => 3, 'room' => 'Lab 301', 'color' => 'bg-blue-500'],
            ['code' => 'MTK201', 'name' => 'Kalkulus II', 'lecture_name' => 'Prof. Susi', 'credits' => 4, 'room' => 'Ruang 204', 'color' => 'bg-green-500'],
            ['code' => 'FIS101', 'name' => 'Fisika Dasar', 'lecture_name' => 'Dr. Iwan', 'room' => 'Lab Fisika', 'color' => 'bg-purple-500'],
            ['code' => 'ENG102', 'name' => 'English for IT', 'lecture_name' => 'Mrs. Ani', 'room' => 'Ruang 105', 'color' => 'bg-yellow-500'],
            ['code' => 'DB201', 'name' => 'Basis Data', 'lecture_name' => 'Dr. Budi', 'room' => 'Lab 302', 'color' => 'bg-red-500'],
        ];

        foreach ($subjects as $s) {
            DB::table('subjects')->insert(array_merge($s, [
                'semester' => 1,
                'description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
