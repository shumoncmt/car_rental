@extends('layouts.app')

@section('title', 'Book ' . $car->name)

@section('content')
    <h1>Book {{ $car->name }}</h1>
    <div class="card mb-4">
        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
        <div class="card-body">
            <p>Brand: {{ $car->brand }}</p>
            <p>Model: {{ $car->model }}</p>
            <p>Year: {{ $car->year }}</p>
            <p>Type: {{ $car->car_type }}</p>
            <p>Price: ${{ $car->daily_rent_price }}/day</p>
        </div>
    </div>
    @auth
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
            @error('msg')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to book this car.</p>
    @endauth
@endsection