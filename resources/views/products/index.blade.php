@extends('layouts.app')
@vite('resources/css/products/product.css')
@section('content')
    <div class="container">
        <h1>Products</h1>

        <a href="{{ route('products.create') }}" class="add-product">Create Product</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Suppliers</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            @foreach ($product->suppliers as $supplier)
                                {{ $supplier->name }} (Quantity:
                                {{ $supplier->pivot->quantity }})
                                <br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
