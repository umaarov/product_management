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
                <th>Products</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>
                        @if ($supplier->products->isEmpty())
                            <span>No products available</span>
                        @else
                            <ul>
                                @foreach ($supplier->products as $product)
                                    <li>{{ $product->name }} - ${{ $product->price }} ({{ $product->category->name }})</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="edit-btn">Edit</a>
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
