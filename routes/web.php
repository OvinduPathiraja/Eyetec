<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;              // PUBLIC
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;               // USER ORDERS
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (GUEST + USER)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/products', [ProductController::class, 'products'])
    ->name('products');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.details');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |---------------- CART ----------------
    */
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/cart/update/{item}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])
        ->name('cart.remove');

    /*
    |---------------- CHECKOUT ----------------
    */
    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout/place', [CheckoutController::class, 'place'])
        ->name('checkout.place');

    /*
    |---------------- USER ORDERS ----------------
    */
    Route::get('/my-orders', [OrderController::class, 'myOrders'])
        ->name('orders.my');

    Route::get('/orders/success/{order}', function ($order) {
        return view('orders.success', ['orderId' => $order]);
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

    });
