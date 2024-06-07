<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('list-books')) {
            abort(403);
        }
        $books = Book::with('author')->get();
        return view('book.book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('create-book')) {
            abort(403);
        }
        $authors= Author::all();
        return view('book.create',['authors'=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author_id' => 'required'
        ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author_id = $request->input('author_id');
        $book->save();
        return redirect()->route('book.all')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /*if (! Gate::allows('create-book')) {
            abort(403);
        }*/
        //$authors= Author::all();
        $book = Book::with('author')->find($id);
        return view('book.show',['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! Gate::allows('create-book')) {
            abort(403);
        }
        $authors= Author::all();
        $book = Book::with('author')->find($id);
        return view('book.edit',['book' => $book, 'authors' => $authors]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author_id' => 'required'
        ]);
        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->author_id = $request->input('author_id');
        $book->update();
        return redirect()->route('book.all')->with('success', 'book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('delete-book')) {
            abort(403);
        }
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.all')->with('success', 'Book deleted successfully.');
    }
}
