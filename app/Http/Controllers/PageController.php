<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('cms.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('cms.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'required|unique:pages,slug'
        ]);

        Page::create($request->all());
        return redirect()->route('cms.pages.index')->with('success', 'Página creada exitosamente');
    }

    public function edit(Page $page)
    {
        return view('cms.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'required|unique:pages,slug,' . $page->id
        ]);

        $page->update($request->all());
        return redirect()->route('cms.pages.index')->with('success', 'Página actualizada exitosamente');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('cms.pages.index')->with('success', 'Página eliminada exitosamente');
    }
}
