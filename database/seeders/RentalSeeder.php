<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userID = User::whereRole('customer')->first();
        $carID = Car::first();

        Rental::create([

            'user_id' => $userID->id,
            'car_id' => $carID->id,
            'start_date' => Carbon::parse('Today'),
            'end_date' => Carbon::parse('Monday Next Week'),
            'total_cost' => 500,
            'status' => 'ongoing',
        ]);
    }
}
