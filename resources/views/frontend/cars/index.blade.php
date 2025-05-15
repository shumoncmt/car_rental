@extends('layouts.app')

@section('title', 'Browse Cars')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Available Cars</h1>
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->name }} ({{ $car->brand }})</h5>
                            <p class="card-text">Price: ${{ $car->daily_rent_price }}/day</p>
                            <a href="{{ route('cars.show', $car) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection