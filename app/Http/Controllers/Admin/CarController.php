<?php

namespace App\Http\Controllers\Admin;

use id;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentalStatus = Rental::where('status', 'ongoing');
        $cars = Car::paginate('10');
        return view('admin.cars.index', compact('cars', 'rentalStatus'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|not_in:admin',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|string',
            'car_type' => 'required|string',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('image');
        $imageName = $file->getClientOriginalName();
        $file->move(public_path('uploads'), $imageName);

        Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'car_type' => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'availability' => $request->availability,
            'image' => $imageName,
        ]);
        return redirect()->route('admin.cars.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $car = Car::find($id);
        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cars = Car::find($id);
        return view('admin.cars.edit', compact('cars'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'daily_rent_price' => 'required|numeric',
            'car_type' => 'required|string|max:255',
            'availability' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        ]);

        // Retrieve the car by ID
        $car = Car::find($id);

        // Update the non-image fields
        $car->name = $request->input('name');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->daily_rent_price = $request->input('daily_rent_price');
        $car->car_type = $request->input('car_type');
        $car->availability = $request->input('availability');

        // Handle the image update
        if ($request->hasFile('image')) {

            $oldPath = public_path('uploads/' . $car->image);

            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // Upload the new image
            $file = $request->file('image');
            $newImageName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $newImageName);

            // Update the image path in the database
            $car->image = $newImageName;

        }

        // Save the updated car data to the database
        $car->save();
        return redirect()->route('admin.cars.index');

    }

    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        $oldPath = public_path('uploads/' . $car->image);

        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        return redirect()->back();
    }
}
