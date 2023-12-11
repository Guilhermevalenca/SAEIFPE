<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersGraduatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userGraduates1 = \App\Models\User::factory()->create([
            'name' => 'Usuário Egresso',
            'cpf' => '12345678912',
            'email' => 'graduate@gmail.com',
            'password' => 'ipi123',
            'role' => 'graduate'
        ]);
        \App\Models\UsersGraduates::factory()->create([
            'users_id' => $userGraduates1->id,
            'phone' => '81994139948',
            'phoneIsWhatsApp' => true,
            'genre' => 'Masculino',
            'course' => 'IPI'
        ]);
        $userGraduates2 = \App\Models\User::factory()->create([
            'name' => 'Usuário Egresso2',
            'cpf' => '12345678913',
            'email' => 'graduate2@gmail.com',
            'password' => 'ipi123',
            'role' => 'graduate'
        ]);
        \App\Models\UsersGraduates::factory()->create([
            'users_id' => $userGraduates2->id,
            'phone' => '82994139948',
            'phoneIsWhatsApp' => true,
            'genre' => 'Masculino',
            'course' => 'IPI'
        ]);
    }
}
