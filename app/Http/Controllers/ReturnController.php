<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Expense;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function index()
    {
        $returns = Refund::with('sale')->get();
        return view('returns.index', compact('returns'));
    }

    public function create()
    {
        $sales = Sale::where('status', 'completed')->get();
        return view('returns.create', compact('sales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'reason' => 'required|string|max:255',
        ]);

        $sale = Sale::find($request->sale_id);

        if ($sale->refund) {
            return redirect()->route('returns.create')->withErrors('This sale already has a refund.');
        }

        Refund::create([
            'sale_id' => $sale->id,
            'reason' => $request->reason,
            'quantity' => $sale->quantity,
        ]);

        $product = $sale->product;
        $product->increment('quantity', $sale->quantity);

        $sale->update(['status' => 'refunded']);

        return redirect()->route('returns.index')->with('success', 'Return processed successfully');
    }

    public function supplierReturn(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'reason' => 'required|string|max:255',
        ]);

        $product = Product::find($request->product_id);

        if ($product->quantity < $request->quantity) {
            return redirect()->route('returns.create')->withErrors('Insufficient stock to return to supplier.');
        }

        $product->decrement('quantity', $request->quantity);

        Expense::create([
            'amount' => $product->price * $request->quantity,
            'supplier_id' => $product->supplier_id,
        ]);

        return redirect()->route('returns.index')->with('success', 'Product returned to supplier successfully');
    }
}
