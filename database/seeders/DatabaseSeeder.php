<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
//           UsersSeeder::class,
           UsersAdmSeeder::class,
           UsersGraduatesSeeder::class,
           UsersStudyingSeeder::class,
//           DepositionsSeeder::class,
//           FormSeeder::class,
//           PostsIfpeSeeder::class,
        ]);
    }
}
