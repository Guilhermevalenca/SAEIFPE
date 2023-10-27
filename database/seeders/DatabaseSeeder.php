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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //name //email // password
        $userAdm = \App\Models\User::factory()->create([
            'name' => 'usuário administrador',
            'cpf' => '12345678910',
            'email' => 'adm@gmail.com',
            'password' => 'ipi123'
        ]);
        \App\Models\UsersAdm::factory()->create([
            'users_id' => $userAdm->id
        ]);
        $userStudying = \App\Models\User::factory()->create([
            'name' => 'usuário estudante',
            'cpf' => '12345678911',
            'email' => 'student@gmail.com',
            'password' => 'ipi123'
        ]);
        \App\Models\UsersStudying::factory()->create([
            'users_id' => $userStudying->id
        ]);
        //cpf phone phoneIsWhatsApp genre course
        $userGraduates = \App\Models\User::factory()->create([
            'name' => 'usuário egresso',
            'cpf' => '12345678912',
            'email' => 'graduate@gmail.com',
            'password' => 'ipi123'
        ]);
        \App\Models\UsersGraduates::factory()->create([
            'users_id' => $userGraduates->id,
            'phone' => '81994139948',
            'phoneIsWhatsApp' => true,
            'genre' => 'Masculino',
            'course' => 'IPI'
        ]);
    }
}
