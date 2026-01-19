<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = User::factory()->create([
            'name' => 'student',
            'email' => 'student@school.nl',
            'password' => Hash::make('student')
        ]);
        $student->assignRole('student');

        $teacher = User::factory()->create([
            'name' => 'teacher',
            'email' => 'teacher@school.nl',
            'password' => Hash::make('teacher')
        ]);
        $teacher->assignRole('teacher');

        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@school.nl',
            'password' => Hash::make('admin')
        ]);
        $admin->assignRole('admin');
    }
}
