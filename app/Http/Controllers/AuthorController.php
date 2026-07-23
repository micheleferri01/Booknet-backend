<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $authors = Author::where('name', 'like', '%' . $request->search . '%')
            ->get();

        if ($request->ajax()) {
            return view('authors.partials.authors-list', compact('authors'));
        }

        return view('authors.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|string|unique:authors,name|max:255|regex:/^[\pL\s]+$/u'
        ]);

        $newAuthor = new Author();
        $newAuthor->name = $validatedData['name'];
        $newAuthor->save();

        return redirect()->route('authors.show', compact('newAuthor'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $authorId = $author->id;
        $books = Book::whereHas('author', function ($query) use ($authorId){
            return $query->where('author_id', $authorId);
        })->get();
        return view('authors.show', compact('author', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:authors,name|max:255|regex:/^[\pL\s]+$/u'
        ]);

        $author->name = $validatedData['name'];
        $author->update();

        return redirect()->route('authors.show', $author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index');
    }
}
