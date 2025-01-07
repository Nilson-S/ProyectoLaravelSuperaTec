@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Iniciar Sesión</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
        </div>

        <a href="{{ route('password.security') }}" class="text-primary">Recuperar contraseña mediante pregunta de seguridad</a>

        <br><br>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>
</div>
@endsection
