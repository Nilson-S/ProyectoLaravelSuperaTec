<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageRoles()
    {
        $roles = Role::all();
        return view('admin.roles', compact('roles'));
    }
    public function assignRolesToUsers()
{
    // Encuentra al usuario por ID (puedes usar otro campo como 'email' si lo prefieres)
    $user1 = User::find(4); // Suponiendo que el usuario tiene ID 4
    $user2 = User::find(5); // Suponiendo que el usuario tiene ID 5

    // Asignar el rol 'Admin' al usuario 4
    $user1->assignRole('Admin');

    // Asignar el rol 'Visitante' al usuario 5
    $user2->assignRole('Visitante');

    

    // También puedes asignar múltiples roles a un usuario
    // $user2->assignRole(['Publicador', 'Admin']);

    return 'Roles asignados exitosamente';
}
    
}
