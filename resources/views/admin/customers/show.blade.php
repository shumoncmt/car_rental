@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')
    <h1>Customer: {{ $customer->name }}</h1>
    <p>Email: {{ $customer->email }}</p>
    <h2>Rental History</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
                    <td>{{ $rental->start_date }}</td>
                    <td>{{ $rental->end_date }}</td>
                    <td>${{ $rental->total_cost }}</td>
                    <td>{{ ucfirst($rental->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection