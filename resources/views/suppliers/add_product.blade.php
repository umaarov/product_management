@extends('layouts.app')
@vite('resources/css/suppliers/supplier.css')
@section('content')
    <h1>Add Product for {{ $supplier->name }}</h1>

    <form action="{{ route('suppliers.storeProduct', $supplier->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Add Product</button>
    </form>
@endsection
