<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with(['products' => function ($query) {
            $query->withTrashed();
        }, 'products.category'])->get();
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

        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully');
    }

    public function edit(Supplier $supplier)
    {
        $products = $supplier->products()->withTrashed()->with('category')->get();
        return view('suppliers.edit', compact('supplier', 'products'));
    }


    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'required|string|max:15',
        ]);

        $supplier->update($request->only(['name', 'email', 'phone']));

        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully');
    }

    public function destroy(Supplier $supplier)
    {
        if ($supplier->products()->count() > 0) {
            return redirect()->route('suppliers.index')->withErrors('Cannot delete supplier with associated products.');
        }

        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully');
    }

    public function addProduct(Supplier $supplier)
    {
        $categories = Category::all();
        return view('suppliers.add_product', compact('supplier', 'categories'));
    }

    public function storeProduct(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $supplier->products()->create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 0,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('suppliers.edit', $supplier->id)->with('success', 'Product added to supplier successfully');
    }

    public function deleteProduct(Supplier $supplier, $productId)
    {
        $product = $supplier->products()->withTrashed()->find($productId);

        if (!$product) {
            return redirect()->route('suppliers.edit', $supplier->id)
                ->withErrors('Product not found.');
        }

        if ($product->supplier_id !== $supplier->id) {
            return redirect()->route('suppliers.edit', $supplier->id)
                ->withErrors('Product does not belong to this supplier.');
        }

        $product->delete();

        return redirect()->route('suppliers.edit', $supplier->id)
            ->with('success', 'Product deleted successfully');
    }
}
