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

    public function add(Request $request, Product $product)
{
    $request->validate([
        'quantity' => 'required|integer|min:1|max:' . $product->stock,
    ]);

    $cart = Cart::firstOrCreate([
        'user_id' => auth()->id(),
        'status'  => 'active',
    ]);

    $item = $cart->items()->where('product_id', $product->id)->first();

    if ($item) {
        $newQty = $item->quantity + $request->quantity;

        if ($newQty > $product->stock) {
            return back()->with('error', 'Not enough stock available');
        }

        $item->update(['quantity' => $newQty]);
    } else {
        $cart->items()->create([
            'product_id' => $product->id,
            'price'      => $product->price,
            'quantity'   => $request->quantity,
        ]);
    }

    return redirect()->route('cart.index')
        ->with('success', 'Product added to cart');
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
