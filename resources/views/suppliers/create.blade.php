@extends('layouts.app')

@section('content')
    <h1>Add Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <label for="name">Supplier Name:</label>
        <input type="text" name="name" id="name">

        <label for="contact">Contact Information:</label>
        <input type="text" name="contact" id="contact">

        <button type="submit">Add Supplier</button>
    </form>
@endsection
