<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->get();
        return view('admin.rentals.index', compact('rentals'));
    }

    public function edit(Rental $rental)
    {
        return view('admin.rentals.edit', compact('rental'));
    }

    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        $rental->update(['status' => $request->status]);
        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully.');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully.');
    }
}