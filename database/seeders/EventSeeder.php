<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        try {
            for ($i = 1; $i <= 10; $i++) {
                Event::create([
                    'title'         =>  'event ' . $i, 
                    'start_time'    =>  $faker->dateTime(), 
                    'end_time'      =>  $faker->dateTime(), 
                    'color'         =>  $faker->randomElement(['#dc3545','#ffc107','#28a745']), 
                ]);
            }

            echo "✔ Berhasil";
        } catch (\Throwable $e) {
            echo "❌ Gagal";
        }
        
    }
}
