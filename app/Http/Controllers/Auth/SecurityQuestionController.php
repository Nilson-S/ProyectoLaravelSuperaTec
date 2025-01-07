<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SecurityQuestionController extends Controller
{
    public function showEmailForm()
    {
        return view('auth.passwords.security_questions');
    }

    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        return view('auth.passwords.answer_question', ['user' => $user]);
    }

    public function verifyAnswer(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'respuesta_secreta' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->respuesta_secreta === $request->respuesta_secreta) {
            return view('auth.passwords.reset_password', ['email' => $user->email]);
        }

        return back()->withErrors(['respuesta_secreta' => 'La respuesta a la pregunta de seguridad es incorrecta.']);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:7',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Tu contraseña ha sido restablecida con éxito.');
    }
}
