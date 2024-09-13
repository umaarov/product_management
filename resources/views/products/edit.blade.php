@extends('layouts.app')
@vite('resources/css/products/product.css')
@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="name">Product Name:</label></td>
                <td><input type="text" name="name" id="name" value="{{ $product->name }}"></td>
            </tr>
            <tr>
                <td><label for="price">Price:</label></td>
                <td><input type="text" name="price" id="price" value="{{ $product->price }}"></td>
            </tr>
            <tr>
                <td><label for="quantity">Quantity:</label></td>
                <td><input type="text" name="quantity" id="quantity" value="{{ $product->quantity }}"></td>
            </tr>
            <tr>
                <td><label for="category_id">Category:</label></td>
                <td>
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="supplier_id">Supplier:</label></td>
                <td>
                    <select name="supplier_id" id="supplier_id">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}"
                                {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
@endsection
