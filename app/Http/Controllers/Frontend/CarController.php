<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $cars = Car::where('availability', true);

        if ($request->has('car_type')) {
            $cars->where('car_type', $request->car_type);
        }

        $cars = $cars->get();
        return view('frontend.cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('frontend.cars.show', compact('car'));
    }
}
