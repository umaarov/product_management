@extends('layouts.app')
@vite('resources/css/sales/sale.css')
@section('content')
    <h1>Sales</h1>
    <a href="{{ route('sales.create') }}" class="add-sale">Add Sale</a>
    <table>
        <thead>
            <tr>
                <th>Client</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->client->name }}</td>
                    <td>{{ $sale->product->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>${{ $sale->total_price }}</td>
                    <td>
                        @if ($sale->status === 'refunded')
                            <span>(Refunded)</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
