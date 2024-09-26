<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class RentalController extends Controller
{
    
    public function index()
    {
        $rentals = Rental::paginate('10');
        return view("admin.rentals.index", compact("rentals"));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rental = Rental::find($id);
        return view("admin.rentals.show", compact("rental"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rental = Rental::find($id);
        return view('admin.rentals.edit', compact('rental'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {       
       

        $rental = Rental::find($id);

        $rental->user->name = $request->input('name');
        $rental->car->model = $request->input('model');
        $rental->start_date = $request->input('start_date');
        $rental->start_time = $request->input('start_time');
        $rental->end_date = $request->input('end_date');
        $rental->total_cost = $request->input('total_cost');
        $rental->status = $request->input('status');

        $rental->save();
        if($rental->status ==  'completed' || $rental->status ==  'canceled' ) {
            $rental->car->update(['availability' => true]);
        }
        return redirect()->route('admin.rentals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   

        $rental = Rental::find($id);
        $rental->car()->update(['availability' => true]);
        $rental->delete();
        return redirect()->route('admin.rentals.index');
    }
}
