@extends('layouts.app')
@vite('resources/css/suppliers/supplier.css')

@section('content')
    <h1>Edit Supplier</h1>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Supplier Name:</label>
        <input type="text" name="name" id="name" value="{{ $supplier->name }}">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $supplier->email }}">

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $supplier->phone }}">

        <button type="submit">Update Supplier</button>
    </form>

    <h2>Manage Products</h2>

    <a href="{{ route('suppliers.addProduct', $supplier->id) }}" class="add-product-btn">Add Product</a>

    @if ($products->isEmpty())
        <p>No products available for this supplier.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <form action="{{ route('suppliers.deleteProduct', [$supplier->id, $product->id]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete Product</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
