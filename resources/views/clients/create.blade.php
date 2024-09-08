@extends('layouts.app')

@section('content')
    <h1>Add Client</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <label for="name">Client Name:</label>
        <input type="text" name="name" id="name">

        <label for="contact">Contact Information:</label>
        <input type="text" name="contact" id="contact">

        <button type="submit">Add Client</button>
    </form>
@endsection
