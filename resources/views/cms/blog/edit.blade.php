@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Post del Blog</h1>

    <form action="{{ route('cms.blog.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}">
        </div>

        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea name="content" id="descripcion" class="form-control">{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
<script>
    CKEDITOR.replace('descripcion');
</script> 
@endsection
