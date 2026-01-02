<x-guest-layout>
<div class="bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- BREADCRUMB --}}
    <nav class="text-sm text-gray-500 mb-6">
        <a href="{{ route('products') }}" class="hover:text-red-600">Products</a>
        <span class="mx-2">/</span>
        <span class="text-gray-700">{{ $product->product_name }}</span>
    </nav>

    {{-- PRODUCT MAIN --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-white p-6 rounded-xl shadow">

        {{-- IMAGE --}}
        <div class="bg-gray-100 rounded-xl flex items-center justify-center h-[420px]">
            <img
                src="{{ $product->image && file_exists(public_path($product->image))
                    ? asset($product->image)
                    : asset('images/placeholder.png') }}"
                class="w-[320px] h-[320px] object-contain"
                width="320"
                height="320"
                loading="lazy"
                alt="{{ $product->product_name }}"
            />
        </div>

        {{-- DETAILS --}}
        <div class="flex flex-col">

            <h1 class="text-2xl font-bold mb-2">
                {{ $product->product_name }}
            </h1>

            <p class="text-gray-500 text-sm mb-4">
                Brand: <span class="font-medium">{{ $product->brand_name }}</span>
            </p>

            {{-- PRICE --}}
            <div class="text-3xl font-bold text-red-600 mb-4">
                LKR {{ number_format($product->price, 2) }}
            </div>

            {{-- STOCK --}}
            <span class="inline-block w-fit text-xs px-3 py-1 rounded mb-6
                {{ $product->stock > 0 ? 'bg-green-600' : 'bg-gray-400' }} text-white">
                {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
            </span>

            {{-- DESCRIPTION --}}
            <p class="text-gray-600 text-sm leading-relaxed mb-8">
                {{ $product->description }}
            </p>

            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="space-y-3">
                @csrf

                <label class="block text-sm font-semibold">Quantity</label>
                <input type="number"
                    name="quantity"
                    min="1"
                    max="{{ $product->stock }}"
                    value="1"
                    class="border rounded px-3 py-2 w-24"
                    required>

                <button class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
                    Add to Cart
                </button>
            </form>


        </div>
    </div>

    {{-- RELATED PRODUCTS --}}
    @if($relatedProducts->count())
    <div class="mt-14">
        <h2 class="text-xl font-bold mb-6">Related Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts as $item)
            <a href="{{ route('products.details', $item->id) }}"
               class="bg-white border rounded-xl p-4 hover:shadow transition block">

                <div class="h-[160px] bg-gray-100 flex items-center justify-center mb-3 rounded">
                    <img
                        src="{{ $item->image && file_exists(public_path($item->image))
                            ? asset($item->image)
                            : asset('images/placeholder.png') }}"
                        class="w-[120px] h-[120px] object-contain"
                        width="120"
                        height="120"
                    /> 
                </div>

                <h3 class="text-sm font-semibold mb-1">
                    {{ $item->product_name }}
                </h3>

                <span class="text-red-600 font-bold text-sm">
                    LKR {{ number_format($item->price, 2) }}
                </span>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
</div>
</x-guest-layout>
