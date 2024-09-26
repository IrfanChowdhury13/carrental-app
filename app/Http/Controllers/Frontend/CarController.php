<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {

        $query = Car::query();

        // Filter by Car Type
        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }

        // Filter by Brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Sort by Price
        if ($request->filled('daily_rent_price')) {
            if ($request->price == 'low') {
                $query->orderBy('daily_rent_price', 'asc');
            } elseif ($request->price == 'high') {
                $query->orderBy('daily_rent_price', 'desc');
            }
        }

        // Fetch filtered results
        $cars = $query->get();

        // Pass data to the view
        $carTypes = Car::select('car_type')->distinct()->pluck('car_type');
        $brands = Car::select('brand')->distinct()->pluck('brand');

        return view('frontend.cars.index', compact('cars', 'carTypes', 'brands'));
    }
}
