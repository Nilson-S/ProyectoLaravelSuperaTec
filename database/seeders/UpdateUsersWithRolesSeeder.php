<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UpdateUsersWithRolesSeeder extends Seeder
{
    public function run()
    {
        // Actualizar todos los usuarios sin rol y asignarles el rol 'Visitante' por defecto
        User::whereNull('role')->update(['role' => 'Visitante']);
    }
}
