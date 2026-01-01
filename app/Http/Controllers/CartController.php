<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // View cart
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->with('items.product')
            ->first();

        return view('cart.index', compact('cart'));
    }

    // Add product to cart
    public function add(Product $product)
    {
        // Optional stock protection
        if ($product->stock <= 0) {
            return back()->with('error', 'Product is out of stock');
        }

        $cart = Cart::firstOrCreate(
            ['user_id' => Auth::id(), 'status' => 'active']
        );

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            CartItem::create([
                'cart_id'   => $cart->id,
                'product_id'=> $product->id,
                'quantity'  => 1,
                'price'     => $product->price,
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }

    // Update quantity
    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item->update([
            'quantity' => $request->quantity
        ]);

        return back()->with('success', 'Cart updated');
    }

    // Remove item
    public function remove(CartItem $item)
    {
        $item->delete();

        return back()->with('success', 'Item removed');
    }
}
