<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);
        return view('payment.simulate', compact('order'));
    }

    public function confirm(Order $order)
    {
        abort_if($order->user_id !== auth()->id(), 403);

        $order->update([
            'status' => 'paid'
        ]);

        return redirect()->route('orders.success', $order->id);
    }
}
