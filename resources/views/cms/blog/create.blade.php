@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Post</h1>

    <form action="{{ route('cms.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea class="form-control" id="descripcion" name="content" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Fecha de Publicación</label>
            <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at') }}">
        </div>
        
         <!-- Campo para subir la imagen -->
    <div class="mb-3">
        <label for="image" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

        <button type="submit" class="btn btn-success">Guardar Post</button>
    </form>
</div>

<script>
    CKEDITOR.replace('descripcion');
</script> 
@endsection
