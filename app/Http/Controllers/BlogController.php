<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Muestra una lista de publicaciones del blog.
     */
    public function index()
    {
        // Obtener todas las publicaciones del blog, incluyendo la relación con el autor (User)
        $blogs = BlogPost::with('author')->get()->map(function ($blog) {
            $blog->content = \Illuminate\Support\Str::limit($blog->content, 100); // Limita el contenido a 100 caracteres
            return $blog;
        });

        // Pasar los blogs a la vista
        return view('cms.blog.index', compact('blogs'));
    }

    /**
     * Muestra el formulario para crear una nueva publicación.
     */
    public function create()
    {
        return view('cms.blog.create');
    }

    /**
     * Guarda una nueva publicación en la base de datos.
     */
    public function store(Request $request)
{
    // Validación de los datos
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'published_at' => 'nullable|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
    ]);

        // Generar el slug a partir del título
        $slug = Str::slug($request->title);


    // Subir la imagen si existe
    $imageName = null;
    if ($request->hasFile('image')) {
        // Obtener el nombre de la imagen y guardarla en la carpeta 'public/storage'
        $imageName = $request->file('image')->store('blog_images', 'public');
    }

    // Crear el post
    $blogPost = new BlogPost();
    $blogPost->title = $request->title;
    $blogPost->content = $request->content;
    $blogPost->published_at = $request->published_at;
    $blogPost->image = $imageName; // Guardamos el nombre de la imagen en la base de datos
    $blogPost->slug = $slug;
    $blogPost->author_id = auth()->user()->id; // Asignar el autor (si se está autenticando como un usuario)
    $blogPost->save();

    return redirect()->route('cms.blog.index')->with('success', 'Post creado exitosamente.');
}

    /**
     * Muestra el formulario para editar una publicación existente.
     */
    public function edit($id)
    {
        $blog = BlogPost::findOrFail($id); // Encuentra el post por su ID
        return view('cms.blog.edit', compact('blog')); // Pasa el post a la vista de edición
    }


    /**
     * Actualiza una publicación existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Encuentra el post por su ID
        $blog = BlogPost::findOrFail($id);

        // Actualiza los campos con los nuevos valores
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirige al listado de posts con un mensaje de éxito
        return redirect()->route('cms.blog.index')->with('success', 'Publicación actualizada correctamente.');
    }

    public function show($id)
    {
        $blog = BlogPost::with('author')->findOrFail($id); // Carga el post con el autor
        return view('cms.blog.show', compact('blog')); // Retorna la vista con el post detallado
    }



    /**
     * Elimina una publicación del blog.
     */
    public function destroy($id)
    {
        // Buscar el post a eliminar
        $blog = BlogPost::findOrFail($id);

        // Eliminar el post
        $blog->delete();

        // Redirigir a la lista de posts con un mensaje de éxito
        return redirect()->route('cms.blog.index')->with('success', 'Publicación eliminada correctamente.');
    }
}
