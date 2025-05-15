@extends('layouts.app')

@section('title', 'Add New Car')

@section('content')
    <h1>Add New Car</h1>
    <form method="POST" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data" class="card p-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" name="brand" id="brand" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" id="model" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="car_type" class="form-label">Car Type</label>
            <input type="text" name="car_type" id="car_type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="daily_rent_price" class="form-label">Daily Rent Price</label>
            <input type="number" step="0.01" name="daily_rent_price" id="daily_rent_price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Car Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Car</button>
    </form>
@endsection