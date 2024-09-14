@extends('layouts.app')
@vite('resources/css/suppliers/supplier.css')
@section('content')
    <div class="container">
        <h1>Suppliers</h1>

        <a href="{{ route('suppliers.create') }}" class="add-supplier">Add Supplier</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Products Provided</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>
                            @foreach ($supplier->products as $product)
                                {{ $product->name }} (Quantity:
                                {{ $product->pivot->quantity }})
                                <br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('suppliers.provideProductForm', $supplier->id) }}"
                                class="btn btn-primary btn-sm">Provide Product</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
