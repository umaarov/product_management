@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name">
        
        <label for="price">Price:</label>
        <input type="text" name="price" id="price">

        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity">

        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label for="supplier_id">Supplier:</label>
        <select name="supplier_id" id="supplier_id">
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>

        <button type="submit">Add supplier</button>
    </form>
@endsection
