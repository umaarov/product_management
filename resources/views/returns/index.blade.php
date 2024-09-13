@extends('layouts.app')
@vite('resources/css/refunds/refund.css')
@section('content')
    <h1>Returns</h1>
    <a href="{{ route('returns.create') }}" class="add-return">Process Return</a>
    <table>
        <thead>
            <tr>
                <th>Return ID</th>
                <th>Sale ID</th>
                <th>Reason</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($returns as $return)
                <tr>
                    <td>{{ $return->id }}</td>
                    <td>{{ $return->sale->id }}</td>
                    <td>{{ $return->reason }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
