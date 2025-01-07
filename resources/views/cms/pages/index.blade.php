
@extends('layouts.app')

@section('content')
<div class="container">
<h1>Gestión de Páginas</h1>
<a href="{{ route('pages.create') }}" class="btn btn-primary">Nueva Página</a>
<table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Slug</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                <td>{{ $page->slug }}</td>
                <td>
                    <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection