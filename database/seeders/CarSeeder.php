<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::create([
            'name' => 'Mustang GT',
            'brand' => 'Ford',
            'model' => 'GT',
            'year' => 2021,
            'car_type' => 'Coupe',
            'daily_rent_price' => 150,
            'availability' => 1,
        ]);

        Car::create([
            'name' => 'Model X',
            'brand' => 'Tesla',
            'model' => 'Long Range',
            'year' => 2023,
            'car_type' => 'SUV',
            'daily_rent_price' => 200,
            'availability' => 1,
        ]);

        Car::create([
           'name' => 'Camry XSE',
            'brand' => 'Toyota',
            'model' => 'XSE V6',
            'year' => 2022,
            'car_type' => 'Sedan',
            'daily_rent_price' => 100,
            'availability' => 1,
        ]);
        
        Car::create([
           'name' => 'Range Rover Velar',
            'brand' => 'Land Rover',
            'model' => 'Velar',
            'year' => 2023,
            'car_type' => 'SUV',
            'daily_rent_price' => 250,
            'availability' => 1,
        ]);
    }
}
