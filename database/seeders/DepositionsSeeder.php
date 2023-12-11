<?php

namespace Database\Seeders;

use App\Models\Depositions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Depositions::factory(30)->create();
    }
}
