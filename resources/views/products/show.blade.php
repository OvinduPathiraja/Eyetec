<form method="POST" action="{{ route('cart.add', $product) }}" class="mt-4">
    @csrf

    {{-- QUANTITY --}}
    <div class="mb-4">
        <label class="block text-sm font-semibold mb-1">
            Quantity
        </label>

        <input
            type="number"
            name="quantity"
            min="1"
            max="{{ $product->stock }}"
            value="1"
            required
            class="w-24 border rounded px-3 py-2"
        >

        <p class="text-xs text-gray-500 mt-1">
            Available stock: {{ $product->stock }}
        </p>
    </div>

    {{-- ADD TO CART --}}
    <button
        type="submit"
        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded">
        Add to Cart
    </button>
</form>
