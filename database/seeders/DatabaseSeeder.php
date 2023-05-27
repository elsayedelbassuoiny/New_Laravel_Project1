<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
<<<<<<< HEAD
use Illuminate\Database\Seeder;
=======
use Database\Seeders\SubjectSeeder;
use Database\Seeders\DepartmentSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
>>>>>>> origin/eslambranch

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
=======

        $this -> call([
            // StudentSeeder::class,
            // DepartmentSeeder::class,
            // SubjectSeeder::class,
            // DoctorSeeder::class
        ]);

        // User::create([
        //     'name' => 'sayed',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'admin'
        // ]);

        // $this -> call([StudentSeeder::class]);

>>>>>>> origin/eslambranch
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
