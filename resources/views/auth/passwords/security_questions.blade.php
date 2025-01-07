@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Recuperar contraseña mediante pregunta de seguridad</h3>
    <form action="{{ route('password.security.check') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Continuar</button>
    </form>
</div>
@endsection
