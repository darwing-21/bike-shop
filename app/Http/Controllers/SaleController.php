<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sale::with(['product', 'user'])->orderBy('sale_date', 'desc')->paginate(5);
        return view('components.sales.index', compact('sales'));
    }


    public function create()
    {
        $products = Product::all();
        $users = User::all();
        return view('components.sales.create', compact('products', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'sale_date' => 'required|date',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->quantity < $request->quantity) {
            return redirect()->back()->with('error', 'No hay suficiente stock disponible para este producto.');
        }

        $product->quantity -= $request->quantity;
        $product->save();

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Venta registrada exitosamente.');
    }



    public function edit(Sale $sale)
    {
        $products = Product::all();
        $users = User::all();
        return view('components.sales.edit', compact('sale', 'products', 'users'));
    }


    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'sale_date' => 'required|date',
        ]);

        $product = Product::findOrFail($request->product_id);
        if ($request->quantity != $sale->quantity) {
            $product->quantity += $sale->quantity;

            if ($product->quantity < $request->quantity) {
                return redirect()->back()->with('error', 'No hay suficiente stock disponible para este producto.');
            }
            $product->quantity -= $request->quantity;
            $product->save();
        }

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Venta actualizada exitosamente.');
    }



    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Venta eliminada exitosamente.');
    }
}
