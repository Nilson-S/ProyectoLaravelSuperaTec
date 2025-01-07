@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">{{ $blog->title }}</h1>
    
    <p><strong>Autor:</strong> {{ $blog->author ? $blog->author->nombres : 'Autor no disponible' }}</p>
    
    <p><strong>Fecha de Publicación:</strong> 
        @if($blog->created_at)
            {{ $blog->created_at->format('d/m/Y') }}
        @else
            Fecha no disponible
        @endif
    </p>
    
    <p><strong>Última Actualización:</strong> 
        @if($blog->updated_at)
            {{ $blog->updated_at->format('d/m/Y H:i') }}
        @else
            Fecha no disponible
        @endif
    </p>
    
    <hr class="my-4">

    <!-- Mostrar la imagen si existe -->
    @if ($blog->image)
    <div class="mb-4">
        <!-- Verificar si la imagen está en el almacenamiento o en la carpeta de imágenes públicas -->
        <img src="{{ asset('storage/' . $blog->image) }}" alt="Imagen del blog" class="img-fluid rounded" style="max-width: 100%; height: auto;">
    </div>
@else
    <p>Imagen no disponible.</p>
@endif

    <!-- Mostrar contenido del blog -->
    <div class="mb-5">
        {!! nl2br(e($blog->content)) !!} <!-- Muestra el contenido con formato de salto de línea -->
    </div>
    
    <a href="{{ route('cms.blog.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
</div>
@endsection
