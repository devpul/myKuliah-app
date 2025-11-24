<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserTableSeeder::class,
            CategorySeeder::class,
            SubjectsTableSeeder::class,
            SchedulesTableSeeder::class,
            TodolistsTableSeeder::class,
            ActivitiesTableSeeder::class,
        ]);
    }
}
