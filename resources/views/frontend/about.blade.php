@extends('layouts.app')

@section('title', 'About')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">About Us</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Our Mission</h2>
                <p>We aim to provide the best car rental services with a wide range of vehicles to choose from.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/about-us.jpg') }}" class="img-fluid" alt="About Us">
            </div>
        </div>
    </div>
@endsection