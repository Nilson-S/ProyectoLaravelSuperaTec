@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <p><strong>Nombre:</strong> {{ $user->nombres }}</p>
    <p><strong>Apellido:</strong> {{ $user->apellidos }}</p>
    <p><strong>Cedula:</strong> {{ $user->cedula }}</p>
    <p><strong>Nacionalidad:</strong> {{ $user->nacionalidad }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $user->fecha_nacimiento }}</p>
    <p><strong>Descripcion:</strong> {{ $user->descripcion }}</p>
    <p><strong>Rol:</strong> {{ $user->roles->pluck('name')->join(', ') }}</p> <!-- Mostrar roles del usuario -->
    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
