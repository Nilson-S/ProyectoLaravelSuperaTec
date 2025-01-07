@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asignar Roles a Usuarios</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol Actual</th>
                    <th>Asignar Nuevo Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombres }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td><span class="badge bg-info">{{ $usuario->roles->pluck('name')->implode(', ') }}</span></td>
                        <td>
                            <form action="{{ route('usuarios.asignarRol') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $usuario->id }}">
                                <select name="role" class="form-select">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $usuario->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Asignar Rol</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-info">Ver Detalles</a>

                            <!-- Mostrar la opción de eliminar solo si el usuario autenticado tiene el rol de Admin -->
                            @if(auth()->user()->hasRole('Admin'))
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
