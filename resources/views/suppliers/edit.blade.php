@extends('layouts.app')

@section('content')
    <h1>Edit Supplier</h1>
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Supplier Name:</label>
        <input type="text" name="name" id="name" value="{{ $supplier->name }}">

        <label for="contact">Contact Information:</label>
        <input type="text" name="contact" id="contact" value="{{ $supplier->contact }}">

        <button type="submit">Update Supplier</button>
    </form>
@endsection
