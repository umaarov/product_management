@extends('layouts.app')
@vite('resources/css/suppliers/supplier.css')

@section('content')
    <h1>Suppliers</h1>
    <a href="{{ route('suppliers.create') }}" class="add-supplier">Add Supplier</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="edit-btn">Edit</a>
                        <a href="{{ route('suppliers.addProduct', $supplier->id) }}" class="add-product-btn">Add Product</a>
                        <!-- New button to add product -->
                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
