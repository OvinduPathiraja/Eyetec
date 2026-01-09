<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * ============================
     * PUBLIC: Products Listing Page
     * ============================
     */
    public function products(Request $request)
    {
        $query = Product::query();

        if ($request->filled('brand')) {
            $query->where('brand_name', $request->brand);
        }

        if ($request->filled('category')) {
            $query->where('product_category', $request->category);
        }

        if ($request->sort === 'low_high') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort === 'high_low') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->paginate(8)->withQueryString();

        $brands = Product::select('brand_name')
            ->whereNotNull('brand_name')
            ->distinct()
            ->pluck('brand_name');

        $categories = Product::select('product_category')
            ->whereNotNull('product_category')
            ->distinct()
            ->pluck('product_category');

        return view('products', compact(
            'products',
            'brands',
            'categories'
        ));
    }

    /**
     * ============================
     * PUBLIC: Product Details Page
     * ============================
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('id', '!=', $product->id)
            ->where('product_category', $product->product_category)
            ->latest()
            ->take(4)
            ->get();

        return view('products-details-page', compact(
            'product',
            'relatedProducts'
        ));
    }
}
