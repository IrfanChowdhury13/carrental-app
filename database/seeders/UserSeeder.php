<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            "name"=> "irfan",
            "email"=> "irfanzahinchowdhury32@gmail.com",
            'phone'=> 12341567498,
            'address' => '',
            "password"=> bcrypt("123456789"),
            "role"=> "admin",
        ]);
        User::updateOrCreate([
            "name"=> "Customer",
            "email"=> "customer@gmail.com",
            'phone' => 687954313,
            'address' => '',
            "password"=> bcrypt("123456789"),
            "role"=> "customer",
        ]);
        User::updateOrCreate([
            "name"=> "Customer2",
            "email"=> "customer2@gmail.com",
            'phone' => 979845654165132,
            'address' => '',
            "password"=> bcrypt("123456789"),
            "role"=> "customer",
        ]);
    }
}
