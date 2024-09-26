<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;

class PageController extends Controller
{
    public function home() {

        $cars = Car::latest()->take(6)->get();


        return view('frontend.home', compact('cars'));
    }

    public function booking(){
        $rentals = Rental::all();
        return view('frontend.dashboard',compact('rentals'));
    }

    public function bookingForm($id){
        $car= Car::find($id);
        return view('components.frontend.cars.bookingform',compact('car'));
    }

    public function allCars(){
         $cars = Car::all();
         $carTypes = Car::select('car_type')->distinct()->pluck('car_type');
        $brands = Car::select('brand')->distinct()->pluck('brand');

         return view('frontend.cars.index', compact('cars', 'carTypes', 'brands'));   
    }

}
