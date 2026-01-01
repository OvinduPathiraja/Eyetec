<x-guest-layout>
<div class="bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-4 py-10">

    {{-- PAGE HEADER --}}
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Products</h1>
        <p class="text-gray-600 mt-1">
            Discover high-quality computers & accessories at the best prices
        </p>
    </div>

    {{-- FILTER BAR --}}
    <form method="GET"
          class="bg-white rounded-xl shadow-sm border p-5 mb-10
                 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end">

        {{-- BRAND --}}
        <div>
            <label class="text-xs text-gray-500 mb-1 block">Brand</label>
            <select name="brand" class="w-full border rounded-lg px-3 py-2">
                <option value="">All Brands</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand }}" @selected(request('brand')==$brand)>
                        {{ $brand }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- CATEGORY --}}
        <div>
            <label class="text-xs text-gray-500 mb-1 block">Category</label>
            <select name="category" class="w-full border rounded-lg px-3 py-2">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" @selected(request('category')==$category)>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- SORT --}}
        <div>
            <label class="text-xs text-gray-500 mb-1 block">Sort</label>
            <select name="sort" class="w-full border rounded-lg px-3 py-2">
                <option value="">Newest</option>
                <option value="low_high" @selected(request('sort')=='low_high')>
                    Price: Low → High
                </option>
                <option value="high_low" @selected(request('sort')=='high_low')>
                    Price: High → Low
                </option>
            </select>
        </div>

        {{-- APPLY --}}
        <button class="bg-red-600 hover:bg-red-700 text-white rounded-lg px-4 py-2 font-semibold">
            Apply
        </button>

        {{-- RESET --}}
        <a href="{{ route('products') }}"
           class="text-center border rounded-lg px-4 py-2 hover:bg-gray-100">
            Reset
        </a>
    </form>

    {{-- PRODUCTS GRID --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

@foreach($products as $product)
<div class="bg-white rounded-xl shadow hover:shadow-lg transition
            flex flex-col max-w-full">

    {{-- IMAGE --}}
    <div class="bg-gray-100 h-[220px] flex items-center justify-center relative">
        <img
            src="{{ $product->image && file_exists(public_path($product->image))
                ? asset($product->image)
                : asset('images/placeholder.png') }}"
            class="w-[180px] h-[180px] object-contain"
            width="180"
            height="180"
            loading="lazy"
            alt="{{ $product->product_name }}"
        />

        {{-- STOCK --}}
        <span class="absolute top-2 right-2 text-xs px-2 py-1 rounded
            {{ $product->stock > 0 ? 'bg-green-600' : 'bg-gray-400' }} text-white">
            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
        </span>
    </div>

    {{-- CONTENT --}}
    <div class="p-4 flex flex-col flex-1">
        <h3 class="font-semibold text-sm mb-1">
            {{ $product->product_name }}
        </h3>

        <p class="text-xs text-gray-500 mb-4 line-clamp-2">
            {{ $product->description }}
        </p>

        <div class="mt-auto flex justify-between items-center">
            <span class="font-bold text-red-600">
                LKR {{ number_format($product->price,2) }}
            </span>

            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <button
                    {{ $product->stock <= 0 ? 'disabled' : '' }}
                    class="bg-red-600 text-white px-3 py-1 rounded text-xs
                           disabled:opacity-50">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
@endforeach


</div>


    {{-- PAGINATION --}}
    <div class="mt-12">
        {{ $products->withQueryString()->links() }}
    </div>

</div>
</div>
</x-guest-layout>
