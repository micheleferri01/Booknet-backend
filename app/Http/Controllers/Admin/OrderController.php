<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('books')->orderBy('created_at','DESC')->get();

        return view('orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order){
        $data = $request->validate([
            'status' => [
                'required',
                'in:pending,paid,cancelled'
            ]
        ]);

        $order->update($data);

        return back();
    }
}
