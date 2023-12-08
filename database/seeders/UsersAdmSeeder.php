<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UsersAdm;
class UsersAdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdm = User::factory()->create([
            'name' => 'Usuário Administrador',
            'cpf' => '12345678910',
            'email' => 'adm@gmail.com',
            'password' => 'ipi123',
            'role' => 'adm'
        ]);
        UsersAdm::factory()->create([
            'users_id' => $userAdm->id
        ]);
    }
}
