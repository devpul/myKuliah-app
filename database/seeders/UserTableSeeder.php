<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id' => 1, // Assuming 1 is for admin
                'mahasiswa_id' => '10101010',
                'name' => 'Admin User',
                'email' => 'admin@mykuliah.com',
                'password' => Hash::make('password'),
                'google_id' => null,
            ],
            [
                'role_id' => 2, // Assuming 2 is for student
                'mahasiswa_id' => '20202020',
                'name' => 'Student User',
                'email' => 'student@mykuliah.com',
                'password' => Hash::make('password'),
                'google_id' => null,
            ]
        ]);
    }
}
