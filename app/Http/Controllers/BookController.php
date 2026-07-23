<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Editor;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::where('title','like','%' . $request->search . '%')->get();

        if($request->ajax()){
            return view('books.partials.books_list', compact('books'));
        }

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $editors = Editor::all();
        $genres = Genre::all();
        return view('books.create', compact('authors', 'editors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'title'=>'required|string|max:255',
            'Publication_year' => 'required|integer',
            'plot' => 'nullable|string',
            'price' => 'required|numeric|decimal:2|min:0.01',
            'author_id' => 'required|exists:authors,id',
            'editor_id' => 'required|exists:editors,id',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        $newBook = new Book();

        if(array_key_exists('cover', $validatedData)){
            $cover_path = Storage::putFile('books_covers', $validatedData['cover']);
            $newBook->cover = $cover_path;
        }

        $newBook->title = $validatedData['title'];
        $newBook->Publication_year = $validatedData['Publication_year'];

        if(array_key_exists('plot', $validatedData)){
            $newBook->plot = $validatedData['plot'];
        }

        $newBook->price = $validatedData['price'];
        $newBook->author_id = $validatedData['author_id'];
        $newBook->editor_id = $validatedData['editor_id'];
        $newBook->save();

        $newBook->genres()->attach($validatedData['genres']);

        return redirect()->route('books.show', $newBook);


    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $editors = Editor::all();
        $genres = Genre::all();
        return view('books.edit', compact('authors', 'editors', 'genres', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'title' => 'required|string|max:255',
            'Publication_year' => 'required|integer',
            'plot' => 'nullable|string',
            'price' => 'required|numeric|decimal:2|min:0.01',
            'author_id' => 'required|exists:authors,id',
            'editor_id' => 'required|exists:editors,id',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        
        if (array_key_exists('cover', $validatedData)){
            if ($book->cover) {
                Storage::delete($book->cover);
                }
                $cover_path = Storage::putFile('books_covers', $validatedData['cover']);
                $book->cover = $cover_path;
            }

        $book->title = $validatedData['title'];
        $book->Publication_year = $validatedData['Publication_year'];
        
        if (array_key_exists('plot', $validatedData)) {
            $book->plot = $validatedData['plot'];
            }
            
            $book->price = $validatedData['price'];
            $book->author_id = $validatedData['author_id'];
            $book->editor_id = $validatedData['editor_id'];
            // dd($book->exists, $book->id);
            $book->update();

        if(array_key_exists('genres', $validatedData)){
            $book->genres()->sync($validatedData['genres']);
        }else{
            $book->genres()->detach();
        }


        return redirect()->route('books.show', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if($book->cover){
            Storage::delete($book->cover);
        }
        $book->genres()->detach();
        $book->delete();

        return redirect()->route('books.index');
    }
}
