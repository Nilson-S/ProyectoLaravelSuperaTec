<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios predeterminados
        $admin = User::create([
            'nombres' => 'Admin',
            'apellidos' => 'Super',
            'cedula' => '123456789',
            'nacionalidad' => 'V',
            'email' => 'admin@superatec.com',
            'password' => Hash::make('avion28'),  // Contraseña cifrada
            'pregunta_secreta' => '¿Cuál es el nombre de tu primera mascota?',
            'respuesta_secreta' => 'aa',
            'fecha_nacimiento' => '1980-01-01',
        ]);
        $admin->assignRole('Admin'); // Asignar el rol de Admin

        $publicador = User::create([
            'nombres' => 'Publicador',
            'apellidos' => 'Test',
            'cedula' => '987654321',
            'nacionalidad' => 'V',
            'email' => 'publicador@superatec.com',
            'password' => Hash::make('avion28'),
            'pregunta_secreta' => '¿Cuál es el nombre de tu primera mascota?',
            'respuesta_secreta' => 'aa',
            'fecha_nacimiento' => '1990-05-15',
        ]);
        $publicador->assignRole('Publicador'); // Asignar el rol de Publicador

        $visitante = User::create([
            'nombres' => 'Visitante',
            'apellidos' => 'Test',
            'cedula' => '111223344',
            'nacionalidad' => 'V',
            'email' => 'visitante@superatec.com',
            'password' => Hash::make('avion28'),
            'pregunta_secreta' => '¿Cuál es el nombre de tu primera mascota?',
            'respuesta_secreta' => 'aa',
            'fecha_nacimiento' => '2000-08-20',
        ]);
        $visitante->assignRole('Visitante'); // Asignar el rol de Visitante
    }
}
