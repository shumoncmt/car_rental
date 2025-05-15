<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalConfirmation;

class RentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rentals = auth()->user()->rentals()->with('car')->get();
        return view('frontend.rentals.index', compact('rentals'));
    }

    public function create(Car $car)
    {
        return view('frontend.rentals.create', compact('car'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $car = Car::findOrFail($request->car_id);
        $start = $request->start_date;
        $end = $request->end_date;

        if (!$car->isAvailable($start, $end)) {
            return back()->withErrors(['msg' => 'Car is not available for the selected dates.']);
        }

        $days = (new \DateTime($start))->diff(new \DateTime($end))->days + 1;
        $total_cost = $days * $car->daily_rent_price;

        $rental = Rental::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'start_date' => $start,
            'end_date' => $end,
            'total_cost' => $total_cost,
            'status' => 'booked',
        ]);

        Mail::to(auth()->user()->email)->send(new RentalConfirmation($rental));
        Mail::to('admin@example.com')->send(new RentalConfirmation($rental));

        return redirect()->route('rentals.index')->with('success', 'Booking successful.');
    }

    public function destroy(Rental $rental)
    {
        if ($rental->user_id !== auth()->id() || $rental->start_date <= now()) {
            return redirect()->route('rentals.index')->with('error', 'Cannot cancel this booking.');
        }

        $rental->update(['status' => 'canceled']);
        return redirect()->route('rentals.index')->with('success', 'Booking canceled successfully.');
    }
}