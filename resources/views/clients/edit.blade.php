@extends('layouts.app')
@vite('resources/css/clients/clients.css')
@section('content')
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Client Name:</label>
        <input type="text" name="name" id="name" value="{{ $client->name }}">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $client->email }}">

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $client->phone }}">

        <button type="submit">Update Client</button>
    </form>
@endsection
