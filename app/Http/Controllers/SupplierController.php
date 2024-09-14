<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with('products')->get();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|string|max:15',
        ]);

        Supplier::create($request->only(['name', 'email', 'phone']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    public function provideProductForm(Supplier $supplier)
    {
        $products = Product::all();
        return view('suppliers.provide_product', compact('supplier', 'products'));
    }

    public function storeProvidedProduct(Request $request, Supplier $supplier)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $existingProduct = $supplier->products()->where('product_id', $request->product_id)->first();

        if ($existingProduct) {
            $newQuantity = $existingProduct->pivot->quantity + $request->quantity;
            $supplier->products()->updateExistingPivot($request->product_id, ['quantity' => $newQuantity]);
        } else {
            $supplier->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        }

        $product = Product::find($request->product_id);
        $product->increment('quantity', $request->quantity);

        return redirect()->route('suppliers.index')->with('success', 'Product provided by supplier successfully.');
    }



    public function deleteProduct(Supplier $supplier, $productId)
    {
        $product = $supplier->products()->find($productId);

        if (!$product) {
            return redirect()->route('suppliers.index')->withErrors('Product not found.');
        }

        $supplier->products()->detach($productId);
        return redirect()->route('suppliers.index')->with('success', 'Product removed from supplier.');
    }
}
