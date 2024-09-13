<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;
use App\Models\Refund;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        $totalIncome = Income::sum('amount');
        $totalExpenses = Expense::sum('amount');

        $clientSummary = Client::with('sales')->get()->map(function ($client) {
            return [
                'client' => $client->name,
                'total_sales' => $client->sales->sum('total_price'),
                'total_quantity' => $client->sales->sum('quantity'),
            ];
        });

        $productSummary = Product::with('sales')->get()->map(function ($product) {
            return [
                'product' => $product->name,
                'total_sales' => $product->sales->sum('total_price'),
                'total_quantity_sold' => $product->sales->sum('quantity'),
            ];
        });

        $refundSummary = Refund::with('sale')->get()->map(function ($refund) {
            return [
                'sale_id' => $refund->sale_id,
                'product' => $refund->sale->product->name,
                'quantity' => $refund->quantity,
                'reason' => $refund->reason,
            ];
        });

        return view('analytics.index', compact(
            'totalIncome',
            'totalExpenses',
            'clientSummary',
            'productSummary',
            'refundSummary'
        ));
    }
}
