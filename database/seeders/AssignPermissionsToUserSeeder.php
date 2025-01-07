<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AssignPermissionsToUserSeeder extends Seeder
{
    public function run()
    {
        // Obtener el usuario con ID 4
        $user = User::find(5);

        // Verificar si el usuario existe
        if ($user) {
            // Obtener todos los permisos disponibles
            $permissions = Permission::all();

            // Asignar todos los permisos al usuario
            $user->givePermissionTo($permissions);
        } else {
            // Si el usuario no existe
            echo "Usuario con ID  no encontrado.";
        }
    }
}
