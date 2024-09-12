@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">
        </div><br>
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="{{ $product->price }}">
        </div><br>
        <div>
            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" id="quantity" value="{{ $product->quantity }}">
        </div><br>
        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div><br>
        <div>
            <label for="supplier_id">Supplier:</label>
            <select name="supplier_id" id="supplier_id">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div><br>
        <button type="submit">Update</button>
    </form>
@endsection
