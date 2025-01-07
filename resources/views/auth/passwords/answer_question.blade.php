@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Responde la pregunta de seguridad</h3>
    <form action="{{ route('password.security.verify') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $user->email }}">
        
        <div class="mb-3">
            <label class="form-label">{{ $user->pregunta_secreta }}</label>
            <input type="text" name="respuesta_secreta" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Verificar</button>
    </form>
</div>
@endsection
