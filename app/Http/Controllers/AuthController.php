<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:7',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'cedula' => 'required|string|max:20|unique:users,cedula',
            'nacionalidad' => 'required|in:V,E',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:7|confirmed|regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).+$/',
            'fecha_nacimiento' => 'required|date|before:' . now()->subYears(4)->format('Y-m-d'),
            'pregunta_secreta' => 'required|string|max:255',
            'respuesta_secreta' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'x' => 'nullable|url',
            'descripcion' => 'nullable|string',
        ], [
        'password.min' => 'La contraseña debe tener al menos 7 caracteres.',
        'password.regex' => 'La contraseña debe ser alfanumérica.',
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'cedula.numeric' => 'La cédula solo debe contener números.',
        'fecha_nacimiento.before' => 'Debes tener al menos 4 años para registrarte.',
    ]);

        User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'nacionalidad' => $request->nacionalidad,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'pregunta_secreta' => $request->pregunta_secreta,
            'respuesta_secreta' => $request->respuesta_secreta,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,
            'x' => $request->x,
            'descripcion' => $request->descripcion,
           // 'role' => 'Admin', // Asignar rol por defecto
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Por favor, inicie sesión.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
