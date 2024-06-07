<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('list-authors')) {
            abort(403);
        }
        $authors = Author::withCount('books')->get();
        return view('author.author', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('create-author')) {
            abort(403);
        }
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $author = new Author;
        $author->name = $request->input('name');
        
        $author->save();
        return redirect()->route('author.all')->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       /* if (! Gate::allows('view-author')) {
            abort(403);
        }*/
        $author = Author::find($id);
        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! Gate::allows('update-author')) {
            abort(403);
        }
        $author = Author::find($id);
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $author = Author::find($id);
        $author->name = $request->input('name');
        $author->update();
        return redirect()->route('author.all')->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('delete-author')) {
            abort(403);
        }
        $author = Author::find($id);
        $author->delete();
        return redirect()->route('author.all')->with('success', 'Author deleted successfully.');
    }

    public function list()
    {
        $authors = Author::with('books')->get();
        return view('list', compact('authors'));
    }
}
