@extends('layouts.app')
@vite('resources/css/suppliers/supplier.css')
@section('content')
    <h1>Edit Supplier</h1>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Supplier Name:</label>
        <input type="text" name="name" id="name" value="{{ $supplier->name }}">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $supplier->email }}">

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $supplier->phone }}">

        <button type="submit">Update Supplier</button>
    </form>
@endsection
