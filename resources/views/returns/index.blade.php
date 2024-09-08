@extends('layouts.app')

@section('content')
    <h1>Returns</h1>
    <a href="{{ route('returns.create') }}">Process Return</a>
    <ul>
        @foreach($returns as $return)
            <li>Return ID: {{ $return->id }} - Sale ID: {{ $return->sale->id }} - Reason: {{ $return->reason }}
                <form action="{{ route('returns.destroy', $return->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
