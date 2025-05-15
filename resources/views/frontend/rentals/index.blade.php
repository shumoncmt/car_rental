@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
    <h1>My Bookings</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
                <th>Status</th>
                <th>Action</th>
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
                    <td>
                        @if ($rental->status === 'booked' && $rental->start_date > now())
                            <form action="{{ route('rentals.destroy', $rental) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Cancel</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection