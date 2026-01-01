<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Your cart is empty');
        }

        return view('checkout.index', compact('cart'));
    }

    public function place(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('products')
                ->with('error', 'Your cart is empty');
        }

        $order = null;

        DB::transaction(function () use ($cart, &$order) {

            $total = $cart->items->sum(fn ($item) =>
                $item->quantity * $item->product->price
            );

            $order = Order::create([
                'user_id' => Auth::id(),
                'total'   => $total,
                'status'  => 'pending',
            ]);

            foreach ($cart->items as $item) {

                if ($item->product->stock < $item->quantity) {
                    throw new \Exception('Insufficient stock');
                }

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);

                Product::where('id', $item->product_id)
                    ->decrement('stock', $item->quantity);
            }

            $cart->items()->delete();
            $cart->update(['status' => 'completed']);
        });

        return redirect()->route('orders.success', $order->id);
    }
}
