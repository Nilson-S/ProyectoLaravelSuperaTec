@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Recuperar contraseña</h2>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar enlace de recuperación</button>
    </form>
</div>
@endsection
