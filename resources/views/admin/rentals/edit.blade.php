@extends('layouts.app')

@section('title', 'Edit Rental')

@section('content')
    <h1>Edit Rental #{{ $rental->id }}</h1>
    <form method="POST" action="{{ route('admin.rentals.update', $rental) }}" class="card p-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="ongoing" {{ $rental->status === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ $rental->status === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ $rental->status === 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
@endsection