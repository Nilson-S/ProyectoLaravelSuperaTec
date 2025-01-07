@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Página: {{ $page->title }}</h1>
    <form action="{{ route('cms.pages.update', $page->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $page->title }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $page->slug }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea name="content" id="content" class="form-control" rows="10" required>{{ $page->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('cms.pages.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
