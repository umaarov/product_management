@extends('layouts.app')
@vite('resources/css/products/product.css')
@section('content')
    <div class="container">
        <h1>Create Supplier</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('suppliers.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Supplier Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Supplier</button>
        </form>
    </div>
@endsection
