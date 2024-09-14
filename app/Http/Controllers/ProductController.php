<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('quantity', '>', 0)
        ->withoutTrashed
            ->with('category', 'supplier')
            ->get();
        return view('products.index', compact('products'));
    }

    public function showSupplierProducts()
    {
        $supplierProducts = Product::withTrashed()->with('category', 'supplier')->get();
        return view('products.supplierProducts', compact('supplierProducts'));
    }

    public function purchaseFromSupplier(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $totalCost = $product->price * $request->quantity;

        $product->update([
            'quantity' => $product->quantity + $request->quantity,
        ]);

        return redirect()->route('products.index')->with('success', "You purchased {$request->quantity} units of {$product->name}. Total cost: \${$totalCost}");
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
