@extends('layouts.app')
@vite('resources/css/suppliers/supplier.css')
@section('content')
    <div class="container">
        <h1>Provide Product for {{ $supplier->name }}</h1>
        <form method="POST" action="{{ route('suppliers.storeProvidedProduct', $supplier->id) }}">
            @csrf
            <div class="form-group">
                <label for="product_id">Product</label>
                <select class="form-control" name="product_id" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" required>
            </div>

            <button type="submit">Provide Product</button>
        </form>
    </div>
@endsection
