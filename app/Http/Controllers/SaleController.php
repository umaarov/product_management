<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;
use App\Models\Refund;
use App\Models\Income;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('client', 'product', 'refund')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('sales.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        if ($product->quantity < $request->quantity) {
            return redirect()->route('sales.create')->withErrors('Insufficient stock.');
        }

        $totalPrice = $product->price * $request->quantity;

        $sale = Sale::create([
            'client_id' => $request->client_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'completed',
        ]);

        $product->decrement('quantity', $request->quantity);

        Income::create([
            'amount' => $totalPrice,
            'sale_id' => $sale->id,
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale created successfully');
    }

    public function markRefunded(Sale $sale, Request $request)
    {
        if ($sale->refund) {
            return redirect()->route('sales.index')->withErrors('This sale already has a refund.');
        }

        Refund::create([
            'sale_id' => $sale->id,
            'reason' => $request->reason,
            'quantity' => $sale->quantity,
        ]);

        $product = $sale->product;
        $product->increment('quantity', $sale->quantity);

        $sale->update(['status' => 'refunded']);

        $income = Income::where('sale_id', $sale->id)->first();
        $income->delete();

        return redirect()->route('sales.index')->with('success', 'Sale refunded successfully');
    }

    public function destroy(Sale $sale)
    {
        if ($sale->refund) {
            return redirect()->route('sales.index')->withErrors('Cannot delete a sale with a refund.');
        }

        $sale->delete();

        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully');
    }
}
