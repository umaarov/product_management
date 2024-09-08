<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use App\Models\Sale;
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
        $sales = Sale::all();
        return view('returns.create', compact('sales'));
    }

    public function store(Request $request)
    {
        Refund::create($request->all());

        return redirect()->route('returns.index');
    }
}
