@extends('layouts.app')

@section('content')
    <h1>Sales</h1>
    <a href="{{ route('sales.create') }}">Add Sale</a>
    <ul>
        @foreach($sales as $sale)
            <li>
                {{ $sale->client->name }} bought {{ $sale->quantity }} {{ $sale->product->name }} for ${{ $sale->total_price }}
                @if($sale->status === 'refunded')
                    <span>(Refunded)</span>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
