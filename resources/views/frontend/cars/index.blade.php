@extends('layouts.app')

@section('title', 'Browse Cars')

@section('content')
    <h1>Available Cars</h1>
    <form method="GET" action="{{ route('cars.index') }}" class="mb-4">
        <div class="input-group">
            <select name="car_type" class="form-select">
                <option value="">All Types</option>
                <option value="SUV">SUV</option>
                <option value="Sedan">Sedan</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }} ({{ $car->brand }})</h5>
                        <p class="card-text">
                            Model: {{ $car->model }}<br>
                            Year: {{ $car->year }}<br>
                            Type: {{ $car->car_type }}<br>
                            Price: ${{ $car->daily_rent_price }}/day
                        </p>
                        <a href="{{ route('cars.show', $car) }}" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection