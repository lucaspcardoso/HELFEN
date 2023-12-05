<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Lucas',
            'email' => 'H1Z1R6',
            'password' => Hash::make('H1Z1R6'),
            'cpf_usu' => 0,
            'cnpj_usu' => 0,
            'profile_photo_path' => "https://res.cloudinary.com/duirjecnu/image/upload/v1699453992/aqrbbtskxvvuweha3mx0.png",
            'cep_end_usu' => null,
            'rua_end_usu' => null,
            'bairro_end_usu' => null,
            'num_end_usu' => null,
            'cdd_end_usu' => null,
            'cell_usu' => null,
            'dt_nasc_usu' => null,
            'sexo_usu' => null,
            'role' => 'admin',
            // Defina a função como 'admin'
        ]);


        User::create([
            'name' => 'Sarah',
            'email' => 'sarah@gmail.com',
            'password' => Hash::make('12345678'),
            'cpf_usu' => 0,
            'cnpj_usu' => 0,
            'profile_photo_path' => "https://res.cloudinary.com/duirjecnu/image/upload/v1699453992/aqrbbtskxvvuweha3mx0.png",
            'cep_end_usu' => "13900190",
            'rua_end_usu' => "Rua Francisco Silveira Franco",
            'bairro_end_usu' => "Centro",
            'num_end_usu' => 100,
            'cdd_end_usu' => "Amparo",
            'cell_usu' => "19996110106",
            'dt_nasc_usu' => '01/11/2005',
            'sexo_usu' => "Feminino",
            'role' => 'user',
            // Defina a função como 'admin'
        ]);


        User::create([
            'name' => 'Lucas',
            'email' => 'lucas@gmail.com',
            'password' => Hash::make('12345678'),
            'cpf_usu' => 0,
            'cnpj_usu' => 0,
            'profile_photo_path' => "https://res.cloudinary.com/duirjecnu/image/upload/v1699453992/aqrbbtskxvvuweha3mx0.png",
            'cep_end_usu' => "13900110",
            'rua_end_usu' => "Rua Francisco Silveira Franco",
            'bairro_end_usu' => "Centro",
            'num_end_usu' => 100,
            'cdd_end_usu' => "Amparo",
            'cell_usu' => "19996110106",
            'dt_nasc_usu' => '01/11/2005',
            'sexo_usu' => "Feminino",
            'role' => 'user',
            // Defina a função como 'admin'
        ]);

    }
}
