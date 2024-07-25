<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $ordersCount = \App\Models\Order::count();
        $productsCount = \App\Models\Product::count();
        $categoriesCount = \App\Models\Category::count();

        return view('admin.dashboard.index', compact('ordersCount', 'productsCount', 'categoriesCount'));
    }
}
