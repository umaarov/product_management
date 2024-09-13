@extends('layouts.app')
@vite('resources/css/products/product.css')
@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="add-product">Add Product</a>
    <table>
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> {{ $product->name }} </td>
                    <td> ${{ $product->price }} </td>
                    <td> {{ $product->quantity }} </td>
                    <td> {{ $product->category->name }} </td>
                    <td> {{ $product->supplier->name }} </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
