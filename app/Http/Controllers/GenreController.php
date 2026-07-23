<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres = Genre::where('name', 'like', '%' . $request->search . '%')
            ->get();

        if ($request->ajax()) {
            return view('genres.partials.genres-list', compact('genres'));
        }

        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:authors,name|max:255|regex:/^[\pL\s]+$/u'
        ]);

        $newGenre = new Genre();
        $newGenre->name = $validatedData['name'];
        $newGenre->save();

        return redirect()->route('genres.show', compact('newGenre'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        $books = Book::whereHas('genres', function ($query) use ($genre) {
            $query->where('genres.id', $genre->id);
        })->get();
        return view('genres.show', compact('genre', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:authors,name|max:255|regex:/^[\pL\s]+$/u'
        ]);

        $genre->name = $validatedData['name'];
        $genre->update();

        return redirect()->route('genres.show', compact('genre'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index');
    }
}
