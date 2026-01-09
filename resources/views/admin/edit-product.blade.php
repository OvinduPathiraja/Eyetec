@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">

    <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

    <div class="bg-white p-6 rounded-xl shadow">
        <form method="POST"
              action="{{ route('admin.products.update', $product) }}"
              enctype="multipart/form-data"
              class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold mb-1">Product Name</label>
                <input type="text" name="product_name" value="{{ $product->product_name }}"
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Brand</label>
                <input type="text" name="brand_name" value="{{ $product->brand_name }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Category</label>
                <input type="text" name="product_category" value="{{ $product->product_category }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Price (LKR)</label>
                    <input type="number" step="0.01" name="price" value="{{ $product->price }}"
                           class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Stock</label>
                    <input type="number" name="stock" value="{{ $product->stock }}"
                           class="w-full border rounded px-3 py-2" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Replace Image</label>
                <input type="file" name="image" class="w-full border rounded px-3 py-2">

                @if($product->image)
                    <img src="{{ asset($product->image) }}" class="w-24 mt-3 rounded">
                @endif
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.products.index') }}" class="px-4 py-2 border rounded">
                    Cancel
                </a>
                <button class="bg-red-600 text-white px-6 py-2 rounded">
                    Update Product
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
