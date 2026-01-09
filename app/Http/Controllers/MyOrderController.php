<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        // $orders = Order::where('user_id', Auth::id())
        //     ->with('items.product')
        //     ->latest()
        //     ->get();

        // return view('my-orders', compact('orders'));
        dd('controller hit');

    }
}
