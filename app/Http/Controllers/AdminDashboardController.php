<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        /* ===============================
         | KPI CARDS
         |===============================*/
        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $pendingOrders = Order::where('status', 'pending')->count();

        $totalUsers = User::count();

        $totalRevenue = Order::where('status', 'paid')->sum('total');


        /* ===============================
         | RECENT ORDERS
         |===============================*/
        $latestOrders = Order::with('user')
            ->latest()
            ->take(5)
            ->get();


        /* ===============================
         | LOW STOCK ALERTS
         |===============================*/
        $lowStockProducts = Product::where('stock', '<=', 5)
            ->orderBy('stock', 'asc')
            ->take(5)
            ->get();


        return view('admin.dashboard', [
            'totalProducts'     => $totalProducts,
            'totalOrders'       => $totalOrders,
            'pendingOrders'     => $pendingOrders,
            'totalUsers'        => $totalUsers,
            'totalRevenue'      => $totalRevenue,
            'latestOrders'      => $latestOrders,
            'lowStockProducts'  => $lowStockProducts,
        ]);
    }
}
