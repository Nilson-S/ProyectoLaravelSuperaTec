<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function asignarRol(Request $request)
    {
        // Validar que el rol y el usuario existan
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($request->user_id);

        // Revocar todos los roles anteriores y asignar el nuevo rol
        $user->syncRoles([$request->role]);

        return redirect()->back()->with('success', 'El rol se ha asignado correctamente.');
    }

    public function index()
    {
        $usuarios = User::with('roles')->get();
        $roles = Role::all();

        return view('cms.usuarios.index', compact('usuarios', 'roles'));
    }
    /**
     * Muestra los detalles de un usuario específico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id); // Busca al usuario por su ID o lanza un error 404 si no existe
        return view('cms.usuarios.show', compact('user')); // Retorna la vista con los datos del usuario
    }
    public function destroy($id)
{
    $user = User::findOrFail($id);

    // Solo el Admin puede eliminar usuarios
    if (auth()->user()->hasRole('Admin')) {
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }

    return redirect()->route('usuarios.index')->with('error', 'No tienes permisos para eliminar este usuario.');
}
}

