<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Verificar si los roles ya existen antes de crearlos
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $publicadorRole = Role::firstOrCreate(['name' => 'Publicador']);
        $visitanteRole = Role::firstOrCreate(['name' => 'Visitante']);

        // Creación de permisos
        $editPostsPermission = Permission::firstOrCreate(['name' => 'edit posts']);
        $createPostsPermission = Permission::firstOrCreate(['name' => 'create posts']);
        $deletePostsPermission = Permission::firstOrCreate(['name' => 'delete posts']);
        $viewPostsPermission = Permission::firstOrCreate(['name' => 'view posts']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo([$editPostsPermission, $createPostsPermission, $deletePostsPermission, $viewPostsPermission]);
        $publicadorRole->givePermissionTo([$editPostsPermission, $createPostsPermission]);
        $visitanteRole->givePermissionTo($viewPostsPermission);
    }
}
