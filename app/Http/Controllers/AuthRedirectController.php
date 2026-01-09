<?php

namespace App\Http\Controllers;

class AuthRedirectController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('products');
    }
}
