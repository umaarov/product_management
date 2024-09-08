@extends('layouts.app')

@section('content')
    <h1>Create Sale</h1>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id">
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>

        <label for="product_id">Product:</label>
        <select name="product_id" id="product_id">
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>

        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity">

        <button type="submit">Create</button>
    </form>
@endsection
