@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name">
        </div><br>
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price">
        </div><br>
        <div>    
            <label for="quantity">Quantity:</label>
            <input type="text" name="quantity" id="quantity">
        </div><br>
        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div><br>
        <div>
            <label for="supplier_id">Supplier:</label>
            <select name="supplier_id" id="supplier_id">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div><br>
        <button type="submit">Add supplier</button>
    </form>
@endsection
