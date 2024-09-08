@extends('layouts.app')

@section('content')
    <h1>Suppliers</h1>
    <a href="{{ route('suppliers.create') }}">Add Supplier</a>
    <ul>
        @foreach($suppliers as $supplier)
            <li>{{ $supplier->name }} - {{ $supplier->contact }}
                <a href="{{ route('suppliers.edit', $supplier->id) }}">Edit</a>
                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
