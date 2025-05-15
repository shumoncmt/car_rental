@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to Car Rental</h1>
        <p>Browse and rent your favorite cars easily!</p>
        <a href="{{ route('cars.index') }}" class="btn btn-primary">Browse Cars</a>
    </div>
@endsection
