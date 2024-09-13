@extends('layouts.app')
@vite('resources/css/clients/clients.css')
@section('content')
    <h1>Add Client</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <label for="name">Client Name:</label>
        <input type="text" name="name" id="name">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">

        <button type="submit">Add Client</button>
    </form>
@endsection
