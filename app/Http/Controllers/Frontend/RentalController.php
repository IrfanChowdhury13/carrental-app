<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AdminRentalNotificationMail;
use App\Mail\CustomerRentalMail;
use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{

    public function index()
    {
        $rentals = Auth::user()->rentals;
        // $rentals = Rental::paginate('10');
        return view('frontend.dashboard', compact('rentals'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:today',
        ]);
        $car = Car::findOrFail($request->car_id);

        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));
        $lengthOfDate = $startDate->diffInDays($endDate);
        $totalCost = $car->daily_rent_price * $lengthOfDate;

        $rental = Rental::create([
            'user_id' => Auth::user()->id,
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_date' => $request->end_date,
            'total_cost' => $totalCost,
        ]);

        // Send email to the customer
        Mail::to(Auth::user()->email)->send(new CustomerRentalMail($rental));

        // Send email to the admin
        Mail::to('admin@example.com')->send(new AdminRentalNotificationMail($rental));

        $rental->car()->update(['availability' => false]);

        return redirect()->route('customer.booking')->with('success', 'Car rented successfully!');

    }

    public function cancel($id)
    {
        $rental = Rental::findOrFail($id);
        if ($rental->start_date > now() && $rental->status == 'ongoing') {

            $rental->update(['status' => 'canceled']);
            $rental->car()->update(['availability' => true]);

        }
        return redirect()->route('customer.booking');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**re
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rental = Rental::find($id);
        $rental->delete();
        return redirect()->back();
    }
}
