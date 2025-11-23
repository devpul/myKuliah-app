<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ID-id');

        try { 
            // - table lectures

            // - table schedules

            // - table subjects
            Subject::create([

            ]);
            
            echo "✅ Berhasil";
        } catch (\Throwable $e) {
            echo "Gagal" . PHP_EOL;
        }
    }
}
