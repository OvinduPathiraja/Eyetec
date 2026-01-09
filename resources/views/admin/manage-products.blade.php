@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Manage Products</h1>
            <p class="text-sm text-gray-500">Add, update and manage inventory</p>
        </div>

        <a href="{{ route('admin.products.create') }}"
           class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
            + Add Product
        </a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Image</th>
                    <th class="p-3">Product</th>
                    <th class="p-3">Price</th>
                    <th class="p-3">Stock</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr class="border-b">
                    <td class="p-3">
                        <img src="{{ $product->image ? asset($product->image) : asset('images/placeholder.png') }}"
                             class="w-16 h-16 object-contain rounded">
                    </td>
                    <td class="p-3 font-semibold">{{ $product->product_name }}</td>
                    <td class="p-3 text-red-600">LKR {{ number_format($product->price,2) }}</td>
                    <td class="p-3">{{ $product->stock }}</td>
                    <td class="pt-6 p-3 flex gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}" class="border px-3 py-1 rounded">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                            @csrf @method('DELETE')
                            <button class="border border-red-600 text-red-600 px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="p-6 text-center">No products</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $products->links() }}</div>

</div>
@endsection
