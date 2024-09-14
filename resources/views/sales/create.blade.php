@extends('layouts.app')
@vite('resources/css/sales/sale.css')
@section('content')
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        <label for="client">Select Client</label>
        <select name="client_id" id="client" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>

        <label for="product">Select Product</label>
        <select name="product_id" id="product" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">
                    {{ $product->name }} (Available: {{ $product->quantity }})
                </option>
            @endforeach
        </select>

        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="1" required>

        <button type="submit">Create Sale</button>
    </form>
@endsection
