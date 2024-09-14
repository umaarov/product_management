@extends('layouts.app')
@vite('resources/css/products/product.css')
@section('content')
    <h1>Supplier Products</h1>

    <table>
        <thead>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Supplier</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($supplierProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td>
                        <form action="{{ route('products.purchaseFromSupplier', $product->id) }}" method="POST">
                            @csrf
                            <input type="number" name="quantity" placeholder="Quantity" min="1" required>
                            <button type="submit">Get</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
