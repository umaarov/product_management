@extends('layouts.app')

@section('content')
    <h1>Add Supplier</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <label for="name">Supplier Name:</label>
        <input type="text" name="name" id="name">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">

        <button type="submit">Add Supplier</button>
    </form>
@endsection
