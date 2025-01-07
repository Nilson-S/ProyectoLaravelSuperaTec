@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestión de Blog/Noticias</h1>
        @can('create', App\Models\BlogPost::class)
            <a href="{{ route('cms.blog.create') }}" class="btn btn-primary mb-3">Nueva Entrada</a>
        @endcan
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Fecha de Publicación</th>
                    <th>Fecha de Actualización</th> <!-- Columna para mostrar la fecha de actualización -->
                    <th>Contenido</th>
                    <th>Autor</th>
                    <th>Imagen</th> <!-- Nueva columna para la imagen -->
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>
                            @if ($blog->created_at)
                                {{ $blog->created_at->format('d/m/Y') }}
                            @else
                                Fecha no disponible
                            @endif
                        </td>
                        <td>
                            @if ($blog->updated_at)
                                {{ $blog->updated_at->format('d/m/Y H:i') }} <!-- Mostrar la fecha de actualización -->
                            @else
                                Fecha no disponible
                            @endif
                        </td>
                        <td>
                            @if ($blog->content)
                                {{ $blog->content }} <!-- Mostrar el contenido -->
                            @else
                                Contenido no disponible
                            @endif
                        </td>
                        <td>
                            @if ($blog->author)
                                {{ $blog->author->nombres }} <!-- Mostrar el nombre del autor -->
                            @else
                                Autor no disponible
                            @endif
                        </td>
                        <td>
                            <!-- Mostrar la imagen en miniatura -->
                            @if ($blog->image)
                                <div class="mb-4">
                                    <!-- Verificar si la imagen está en el almacenamiento o en la carpeta de imágenes públicas -->
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Imagen del blog"
                                        class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                </div>
                            @else
                                <p>Imagen no disponible.</p>
                            @endif
                        </td>
                        <td>
                            <!-- Botón de Ver detalles -->
                            <a href="{{ route('cms.blog.show', $blog->id) }}" class="btn btn-info">Ver detalles</a>

                            @can('update', $blog)
                                <a href="{{ route('cms.blog.edit', $blog->id) }}" class="btn btn-warning">Editar</a>
                            @endcan

                            @can('delete', $blog)
                                <form action="{{ route('cms.blog.destroy', $blog->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
