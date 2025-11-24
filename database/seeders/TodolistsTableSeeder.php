<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodolistsTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            // Tasks
            ['type' => 'task', 'subject_id' => 1, 'title' => 'Tugas Algoritma Sorting', 'due_date' => '2025-11-10', 'priority' => 'high', 'status' => 'doing'],
            ['type' => 'task', 'subject_id' => 2, 'title' => 'Latihan Integral', 'due_date' => '2025-11-08', 'priority' => 'medium', 'status' => 'doing'],
            ['type' => 'task', 'subject_id' => 3, 'title' => 'Lab Report Mekanika', 'due_date' => '2025-11-15', 'priority' => 'high', 'status' => 'doing'],
            ['type' => 'task', 'subject_id' => 4, 'title' => 'Essay Technology Impact', 'due_date' => '2025-11-12', 'priority' => 'medium', 'status' => 'doing'],
            ['type' => 'task', 'subject_id' => 5, 'title' => 'Project ERD Design', 'due_date' => '2025-11-18', 'priority' => 'high', 'status' => 'doing'],

            // Exams
            ['type' => 'exam', 'subject_id' => 1, 'title' => 'UTS Algoritma', 'due_date' => '2025-11-20', 'time' => '08:00', 'room' => 'Lab 301'],
            ['type' => 'exam', 'subject_id' => 2, 'title' => 'UTS Kalkulus', 'due_date' => '2025-11-22', 'time' => '10:00', 'room' => 'Ruang 204'],
            ['type' => 'exam', 'subject_id' => 3, 'title' => 'Praktikum Fisika', 'due_date' => '2025-11-25', 'time' => '13:00', 'room' => 'Lab Fisika'],
        ];

        foreach ($items as $i) {
            DB::table('todolists')->insert(array_merge($i, [
                'user_id' => 1,
                'category_id' => null,
                'description' => null,
                'completed_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
