<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Spatie\Permission\Models\Role;

class UsersImport implements ToModel
{
    public function model(array $row)
    {
        $userData = [
            'name' => $row['nombres'],
            'lastname' => $row['apellidos'],
            'phone_number' => $row['telefono'],
            'document_type' => $row['tipo_documento'],
            'document_number' => $row['numero_documento'],
            'email' => $row['correo_electronico'],
            'password' => Hash::make('pass'),
        ];

        try {
            $user = User::create($userData);
            $user->assignRole('Cliente');
            print_r($userData);

            return $user;
        } catch (\Exception $e) {
            dd('Error, dato duplicado');
        }
    }
}
