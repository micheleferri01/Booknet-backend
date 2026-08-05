<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    public function index(Request $request)
    {
        
        $data = $request->validate([
            'books' => ['required', 'array'],
            'books.*.id' => ['required', 'integer'],
            'books.*.quantity' => ['required', 'integer', 'min:1'],
        ]);


        $items = collect($data['books']);

        $books = Book::with(['author', 'editor', 'genres'])
            ->whereIn('id', $items->pluck('id'))
            ->get();

        $books->each(function ($book) use ($items) {

            $item = $items->firstWhere('id', $book->id);

            $book->quantity = $item['quantity'];

        });

        return response()->json([
            'success' => true,
            'data' => $books
        ]);
    }
}
