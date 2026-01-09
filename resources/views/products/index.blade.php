<form method="POST"
      action="{{ route('cart.add', $product) }}"
      class="mt-3"
      onsubmit="event.stopPropagation();">
    @csrf

    <input type="hidden" name="quantity" value="1">

    <button
        type="submit"
        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded w-full">
        Add to Cart
    </button>
</form>
