@extends('layouts.app')

@section('content')
    <h1>Sales</h1>
    <a href="{{ route('sales.create') }}">Add Sale</a>
    <ul>
        @foreach($sales as $sale)
            <li>{{ $sale->client->name }} bought {{ $sale->quantity }} {{ $sale->product->name }} for ${{ $sale->total_price }}
                <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
