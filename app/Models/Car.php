<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    // use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'car_type',
        'daily_rent_price',
        'availability',
        'image',
    ];

/**
 * Get cars for select
 *
 * @return mixed
 */
    public static function getForSelect()
    {
        return self::select('id', 'name')->where('availability', true)->get();
    }
    public static function getCarBrand(){
        return self::select('id', 'brand')->get();
    }
    public static function getCarType(){
        return self::select('id', 'car_type')->get();
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
