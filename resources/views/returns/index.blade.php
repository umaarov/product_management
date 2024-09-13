@extends('layouts.app')

@section('content')
    <h1>Returns</h1>
    <a href="{{ route('returns.create') }}">Process Return</a>
    <ul>
        @foreach($returns as $return)
            <li>Return ID: {{ $return->id }} - Sale ID: {{ $return->sale->id }} - Reason: {{ $return->reason }}
            </li>
        @endforeach
    </ul>
@endsection
