<?php

namespace Database\Factories;

use App\Models\Form;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostsIfpe>
 */
class PostsIfpeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'content' => fake()->text('1000'),
            'send_to' => json_encode(['all']),
            'user_id' => User::pluck('id')->random(),
            'form_id' => Form::pluck('id')->random()
        ];
    }
}
