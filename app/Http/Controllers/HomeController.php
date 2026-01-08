<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Public landing page
     */
    public function index()
    {
        // Featured products (latest 4)
        $featuredProducts = Product::latest()
            ->take(4)
            ->get();

        return view('welcome', compact('featuredProducts'));
    }
}
