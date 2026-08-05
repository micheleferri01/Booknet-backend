<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Book;
use App\Mail\OrderSummaryMail;
use App\Mail\NewOrderNotificationMail;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
    public function checkout(Request $request) {
        
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'books' => ['required', 'array', 'min:1'],
            'books.*.id' => ['required', 'integer', 'exists:books,id'],
            'books.*.quantity' => ['required', 'integer', 'min:1'],
        ]);

        $items = collect($data['books']);

        $books = Book::whereIn(
            'id',
            $items->pluck('id')
        )->get();

        $total = 0;

        foreach ($books as $book) {

            $item = $items->firstWhere('id', $book->id);

            $total += $book->price * $item['quantity'];

        }

        $order = new Order;
        $order->name = $data['name'];
        $order->surname = $data['surname'];
        $order->email = $data['email'];
        $order->total_price = $total;
        $order->save();

        $pivot = [];

        foreach ($books as $book) {

            $item = $items->firstWhere('id', $book->id);

            $pivot[$book->id] = [
                'quantity' => $item['quantity'],
                'unit_price' => $book->price
            ];

        }

        $order->books()->attach($pivot);

        Mail::to($order->email)
        ->queue(new OrderSummaryMail($order));

        Mail::to(config('mail.admin_address'))
        ->queue(new NewOrderNotificationMail($order));

        return response()->json([
            'success' => true,
            'message' => 'ordine ricevuto con successo'
        ], 201);
    }

    
}
