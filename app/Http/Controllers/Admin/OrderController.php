<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show all orders (Admin)
     */
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,cancelled',
        ]);

        // Restore stock if cancelled
        if ($order->status !== 'cancelled' && $request->status === 'cancelled') {
            foreach ($order->items as $item) {
                if ($item->product) {
                    $item->product->increment('stock', $item->quantity);
                }
            }
        }

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Order status updated successfully');
    }
}
