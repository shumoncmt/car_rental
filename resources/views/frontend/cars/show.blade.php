@extends('layouts.app')

@section('title', 'Book ' . $car->name)

@section('content')
    <div class="container">
        <h1 class="text-center my-4">{{ $car->name }}</h1>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid" alt="{{ $car->name }}">
            </div>
            <div class="col-md-6">
                <h2>Details</h2>
                <p><strong>Brand:</strong> {{ $car->brand }}</p>
                <p><strong>Price:</strong> ${{ $car->daily_rent_price }}/day</p>
            </div>
        </div>
        @auth
            <div class="mt-4">
                <h2>Book Now</h2>
                <form method="POST" action="{{ route('rentals.store') }}" class="card p-4">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Book</button>
                </form>
            </div>
        @else
            <p class="mt-4">Please <a href="{{ route('login') }}">login</a> to book.</p>
        @endauth
    </div>
@endsection