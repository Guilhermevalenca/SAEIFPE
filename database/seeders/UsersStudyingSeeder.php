<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersStudyingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userStudying = \App\Models\User::factory()->create([
            'name' => 'Usuário Estudante',
            'cpf' => '12345678911',
            'email' => 'student@gmail.com',
            'password' => 'ipi123',
            'role' => 'student'
        ]);
        \App\Models\UsersStudying::factory()->create([
            'users_id' => $userStudying->id,
            'email_institution' => 'student@discente.ifpe.edu.br',
            'course' => 'ipi',
            'enrollment' => '20232INFIG0001'
        ]);
    }
}
