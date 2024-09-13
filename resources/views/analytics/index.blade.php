@extends('layouts.app')
@section('content')

    <h1>Analytics Summary</h1>

    <h2>General Summary</h2>
    <p><strong>Total Income:</strong> ${{ number_format($totalIncome, 2) }}</p>
    <p><strong>Total Expenses:</strong> ${{ number_format($totalExpenses, 2) }}</p>

    <h2>Client Summary</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Client</th>
                <th>Total Sales ($)</th>
                <th>Total Quantity Purchased</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientSummary as $client)
            <tr>
                <td>{{ $client['client'] }}</td>
                <td>${{ number_format($client['total_sales'], 2) }}</td>
                <td>{{ $client['total_quantity'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Product Summary</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Product</th>
                <th>Total Sales ($)</th>
                <th>Total Quantity Sold</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productSummary as $product)
            <tr>
                <td>{{ $product['product'] }}</td>
                <td>${{ number_format($product['total_sales'], 2) }}</td>
                <td>{{ $product['total_quantity_sold'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Refunds Summary</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Sale ID</th>
                <th>Product</th>
                <th>Quantity Refunded</th>
                <th>Reason</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($refundSummary as $refund)
            <tr>
                <td>{{ $refund['sale_id'] }}</td>
                <td>{{ $refund['product'] }}</td>
                <td>{{ $refund['quantity'] }}</td>
                <td>{{ $refund['reason'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @endsection