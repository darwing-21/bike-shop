<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('brand')->get();
        return view('components.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('components.products.create', compact('brands'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('components.products.edit', compact('product', 'brands'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'brand_id' => 'required|exists:brands,id',
            'model' => 'required|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
