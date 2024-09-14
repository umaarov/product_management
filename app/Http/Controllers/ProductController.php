<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'supplier')->get();
        return view('products.index', compact('products'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $product->update($request->only(['name', 'price', 'quantity', 'category_id', 'supplier_id']));

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function purchaseProduct(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product->update([
            'quantity' => $product->quantity + $request->quantity,
        ]);

        return redirect()->route('products.index')->with('success', 'Product purchased successfully');
    }

    public function create()
    {
        abort(404, 'Direct product creation is not allowed. Please add a product via supplier.');
    }

    public function store(Request $request)
    {
        abort(404, 'Direct product creation is not allowed. Please add a product via supplier.');
    }
}
