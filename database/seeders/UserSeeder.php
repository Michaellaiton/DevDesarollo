<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name' => 'Jaider Steven',
            'lastname' => 'Quimbaya Mendez',
            'phone_number' => 3219801254,
            'document_type' => 'Cedula Ciudadania',
            'document_number' => 1016946493,
            'email' => 'jaiderstivenquimbaya8@gmail.com',
            'password' => Hash::make('superadmin123456')
        ]);

        $super_admin->assignRole('Super Administrador');

        $admin = User::create([
            'name' => 'Michael Felipe',
            'lastname' => 'Laiton Quesada',
            'phone_number' => 3205801254,
            'document_type' => 'Cedula Ciudadania',
            'document_number' => 10168450,
            'email' => 'admin@bolsaTalentum.net',
            'password' => Hash::make('admin12345612')
        ]);

        $admin->assignRole('Administrador');
    }
}
