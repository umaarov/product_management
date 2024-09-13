@extends('layouts.app')
@vite('resources/css/products/product.css')
@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="name">Product Name:</label></td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td><label for="price">Price:</label></td>
                <td><input type="text" name="price" id="price"></td>
            </tr>
            <tr>
                <td><label for="quantity">Quantity:</label></td>
                <td><input type="text" name="quantity" id="quantity"></td>
            </tr>
            <tr>
                <td><label for="category_id">Category:</label></td>
                <td>
                    <select name="category_id" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="supplier_id">Supplier:</label></td>
                <td>
                    <select name="supplier_id" id="supplier_id">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Add Product</button>
                </td>
            </tr>
        </table>
    </form>
@endsection
