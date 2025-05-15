@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">My Bookings</h1>
        <table class="table table-striped">
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
                        <td>{{ $rental->car->name }}</td>
                        <td>{{ $rental->start_date }}</td>
                        <td>{{ $rental->end_date }}</td>
                        <td>${{ $rental->total_cost }}</td>
                        <td>{{ ucfirst($rental->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection