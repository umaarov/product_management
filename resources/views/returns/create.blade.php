@extends('layouts.app')
@vite('resources/css/refunds/refund.css')
@section('content')
    <h1>Process Return</h1>
    <form action="{{ route('returns.store') }}" method="POST">
        @csrf

        <label for="sale_id">Sale:</label>
        <select name="sale_id" id="sale_id">
            @foreach ($sales as $sale)
                <option value="{{ $sale->id }}">Sale ID: {{ $sale->id }} - Product: {{ $sale->product->name }}
                </option>
            @endforeach
        </select>

        <label for="reason">Return Reason:</label>
        <input type="text" name="reason" id="reason">

        <button type="submit">Process Return</button>
    </form>
@endsection
