@extends('layouts.app')
@vite('resources/css/products/product.css')
@section('content')
    <div class="container">
        <h1>Create Product</h1>
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
