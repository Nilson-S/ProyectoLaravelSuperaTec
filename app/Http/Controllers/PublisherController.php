<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Publicador');
    }

    public function createPost()
    {
        return view('publisher.create_post');
    }

    public function storePost(Request $request)
    {
        // Validación y almacenamiento del post
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        // Guardar el post (simulación)
        return redirect()->back()->with('success', 'Post creado con éxito');
    }
}
