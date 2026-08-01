<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index (Request $request){
        $books = Book::with(['author','editor','genres'])
        ->when($request->filled('search'), function ($query) use ($request)
        {
            $query->where('title', 'like', '%' . $request->search . '%');
        })
        ->when($request->filled('author'), function ($query) use ($request)
        {
            $query->whereHas('author', function ($q) use ($request) {
                $q->where('slug', $request->author);
            });
        })
        ->when($request->filled('editor'), function ($query) use ($request)
        {
            $query->whereHas('editor', function ($q) use ($request) {
                $q->where('slug', $request->editor);
            });
        })
        ->when($request->filled('genre'), function ($query) use ($request) 
        {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('slug', $request->genre);
            });
        })->orderBy('title')->get();

        return response()->json([
            'success'=> true,
            'data'=> $books
        ], 200);

    }

    public function show (Book $book) {
        $book->load(['author','editor', 'genres']);

        return response()->json([
            'success'=>true,
            'data'=> $book
        ]);
    }
    
}