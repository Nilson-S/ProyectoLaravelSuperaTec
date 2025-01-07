@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Página</h1>
    <form action="{{ route('cms.pages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea name="content" id="content" class="form-control" rows="10" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('cms.pages.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
