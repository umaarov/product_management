@extends('layouts.app')

@section('content')
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Client Name:</label>
        <input type="text" name="name" id="name" value="{{ $client->name }}">

        <label for="contact">Contact Information:</label>
        <input type="text" name="contact" id="contact" value="{{ $client->contact }}">

        <button type="submit">Update Client</button>
    </form>
@endsection
