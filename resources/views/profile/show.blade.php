@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mi Perfil</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ url('/perfil') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ $user->nombres }}" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ $user->apellidos }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Nueva Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="mb-3">
                <label for="pregunta_secreta" class="form-label">Pregunta de seguridad</label>
                <select name="pregunta_secreta" id="pregunta_secreta" class="form-control" required>
                    <option value="">Selecciona una pregunta</option>
                    <option value="¿Cuál es el nombre de tu primera mascota?">¿Cuál es el nombre de tu primera mascota?</option>
                    <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                    <option value="¿En qué ciudad naciste?">¿En qué ciudad naciste?</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="respuesta_secreta" class="form-label">Respuesta a la pregunta de seguridad</label>
                <input type="text" name="respuesta_secreta" id="respuesta_secreta" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="url" name="facebook" id="facebook" class="form-control" value="{{ $user->facebook }}">
            </div>
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="url" name="instagram" id="instagram" class="form-control" value="{{ $user->instagram }}">
            </div>
            <div class="mb-3">
                <label for="tiktok" class="form-label">TikTok</label>
                <input type="url" name="tiktok" id="tiktok" class="form-control" value="{{ $user->tiktok }}">
            </div>
            <div class="mb-3">
                <label for="x" class="form-label">X (Twitter)</label>
                <input type="url" name="x" id="x" class="form-control" value="{{ $user->x }}">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="5">{{ $user->descripcion }}</textarea>
            </div>
            
            <script>
                CKEDITOR.replace('descripcion');
            </script>
            
            
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>

@endsection
