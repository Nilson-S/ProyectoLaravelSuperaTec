<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
{
    return Validator::make($data, [
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'cedula' => 'required|string|max:20|unique:users',
        'nacionalidad' => 'required|in:V,E',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:7|confirmed',
        'fecha_nacimiento' => 'required|date|before:' . now()->subYears(4)->format('Y-m-d'),
        'facebook' => 'nullable|url',
        'instagram' => 'nullable|url',
        'tiktok' => 'nullable|url',
        'x' => 'nullable|url',
        'descripcion' => 'nullable|string',
    ]);
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
{
    return User::create([
        'nombres' => $data['nombres'],
        'apellidos' => $data['apellidos'],
        'cedula' => $data['cedula'],
        'nacionalidad' => $data['nacionalidad'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'fecha_nacimiento' => $data['fecha_nacimiento'],
        'facebook' => $data['facebook'],
        'instagram' => $data['instagram'],
        'tiktok' => $data['tiktok'],
        'x' => $data['x'],
        'descripcion' => $data['descripcion'],
        'pregunta_secreta' => $data['pregunta_secreta'],
        'respuesta_secreta' => $data['respuesta_secreta'],
    ]);
}
}
