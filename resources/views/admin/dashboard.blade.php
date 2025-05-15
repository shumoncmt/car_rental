@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Cars</h5>
                    <p class="card-text">{{ \App\Models\Car::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Available Cars</h5>
                    <p class="card-text">{{ \App\Models\Car::where('availability', true)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Rentals</h5>
                    <p class="card-text">{{ \App\Models\Rental::count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Earnings</h5>
                    <p class="card-text">${{ \App\Models\Rental::sum('total_cost') }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('admin.cars.index') }}" class="btn btn-primary">Manage Cars</a>
        <a href="{{ route('admin.rentals.index') }}" class="btn btn-primary">Manage Rentals</a>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">Manage Customers</a>
    </div>
@endsection