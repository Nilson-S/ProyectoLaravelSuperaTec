@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registro</h1>
    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" name="nombres" id="nombres" class="form-control" required>
            @error('nombres')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" required>
            @error('apellidos')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="cedula" class="form-label">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" required>
            @error('cedula')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <select name="nacionalidad" id="nacionalidad" class="form-select" required>
                <option value="V">Venezolana</option>
                <option value="E">Extranjera</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
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
            <label for="facebook" class="form-label">Facebook (Opcional)</label>
            <input type="url" name="facebook" id="facebook" class="form-control">
        </div>
        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram (Opcional)</label>
            <input type="url" name="instagram" id="instagram" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tiktok" class="form-label">TikTok (Opcional)</label>
            <input type="url" name="tiktok" id="tiktok" class="form-control">
        </div>
        <div class="mb-3">
            <label for="x" class="form-label">X (Twitter) (Opcional)</label>
            <input type="url" name="x" id="x" class="form-control">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="5"></textarea>
        </div>
        
        <script>
            CKEDITOR.replace('descripcion');
        </script> 
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>
@endsection
