<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depositions>
 */
class DepositionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userGraduate = \App\Models\User::factory()->create([
            'name' => fake()->name,
            'cpf' => fake()->numerify('###########'),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'ipi123',
            'role' => 'graduate'
        ]);
        \App\Models\UsersGraduates::factory()->create([
            'users_id' => $userGraduate->id,
            'phone' => fake()->numerify('#########'),
            'phoneIsWhatsApp' => true,
            'genre' => 'Autobot',
            'course' => 'IPI'
        ]);
        return [
            'content' => fake()->text('378'),
            'user_id' => $userGraduate->id,
            'approved' => 1
        ];
    }
}
