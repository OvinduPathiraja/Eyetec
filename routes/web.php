<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;              // PUBLIC
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;               // USER ORDERS
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthRedirectController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/products', [ProductController::class, 'products'])
    ->name('products');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.details');

    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/{id}', [BlogController::class, 'show'])
    ->name('blogs.show');

Route::middleware('auth')->group(function () {

    // Unified post-login redirect (role-aware)
    Route::get('/redirect', AuthRedirectController::class)
        ->name('auth.redirect');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/cart/update/{item}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout/place', [CheckoutController::class, 'place'])
        ->name('checkout.place');

    Route::get('/my-orders', [OrderController::class, 'myOrders'])
        ->name('orders.my');

    Route::get('/orders/success/{order}', function ($order) {
        $order = \App\Models\Order::with('items.product')
            ->where('user_id', auth()->id())
            ->findOrFail($order);

        return view('orders.success', compact('order'));
    })->name('orders.success');

    /*
    |---------------- USER DASHBOARD ----------------
    | Redirect users to products (NO empty page)
    */
    Route::get('/dashboard', function () {
        return redirect()->route('products');
    })->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (ROLE = admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |---------------- ADMIN DASHBOARD ----------------
        */
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |---------------- ADMIN PRODUCTS ----------------
        */
        Route::get('/products', [AdminProductController::class, 'index'])
            ->name('products.index');

        Route::get('/products/create', [AdminProductController::class, 'create'])
            ->name('products.create');

        Route::post('/products', [AdminProductController::class, 'store'])
            ->name('products.store');

        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])
            ->name('products.edit');

        Route::put('/products/{product}', [AdminProductController::class, 'update'])
            ->name('products.update');

        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])
            ->name('products.destroy');

        /*
        |---------------- ADMIN ORDERS ----------------
        */
        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('orders.index');

        Route::patch('/orders/{order}/status',
            [AdminOrderController::class, 'updateStatus']
        )->name('orders.status');

        Route::get('/blogs', [AdminBlogController::class, 'index'])->name('blogs.index');
        Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blogs.create');
        Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blogs.store');
        Route::get('/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/blogs/{blog}', [AdminBlogController::class, 'update'])->name('blogs.update');
        Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('blogs.destroy');

    });
