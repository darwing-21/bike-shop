<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $recentSales = Sale::with('product', 'user')
            ->orderBy('sale_date', 'desc')
            ->take(5)
            ->get();


        $lowStockProducts = Product::where('quantity', '<=', 5)
            ->orderBy('quantity', 'asc')
            ->get();


        return view('home', compact('recentSales', 'lowStockProducts'));
    }
}
