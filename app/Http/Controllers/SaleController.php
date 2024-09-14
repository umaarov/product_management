<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;
use App\Models\Income;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::whereHas('product')
            ->with(['product' => function ($query) {
                $query->withTrashed();
            }, 'client'])
            ->get();

        return view('sales.index', compact('sales'));
    }


    public function create()
    {
        $clients = Client::all();

        $products = Product::where('quantity', '>', 0)
            ->withTrashed()
            ->get();

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
            return redirect()->route('sales.create')->withErrors('Insufficient amount.');
        }

        $totalPrice = $product->price * $request->quantity;

        $sale = Sale::create([
            'client_id' => $request->client_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
        ]);

        $product->decrement('quantity', $request->quantity);

        Income::create([
            'amount' => $totalPrice,
            'sale_id' => $sale->id,
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale created successfully');
    }
}
