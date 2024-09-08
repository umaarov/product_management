@extends('layouts.app')

@section('content')
    <h1>Sales</h1>
    <a href="{{ route('sales.create') }}">Add Sale</a>
    <ul>
        @foreach($sales as $sale)
            <li>
                {{ $sale->client->name }} bought {{ $sale->quantity }} {{ $sale->product->name }} for ${{ $sale->total_price }}
                
                @if($sale->status == 'refunded')
                    <span style="color: red;">(Refunded)</span>
                @elseif($sale->status == 'cancelled')
                    <span style="color: orange;">(Cancelled)</span>
                @endif

                @if($sale->status == 'completed')
                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @else
                    <span style="color: gray;">(Cannot delete)</span>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
