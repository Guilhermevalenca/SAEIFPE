<?php

namespace Database\Seeders;

use App\Models\PostsIfpe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsIfpeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostsIfpe::factory(30)->create();
    }
}
