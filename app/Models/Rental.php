<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    // use HasFactory;
    // 01/03/25

    protected $fillable = [
        "user_id",
        "car_id",
        "start_date",
        "start_time",
        "end_date",
        "total_cost",
        "status",
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'datetime:d/m/Y',
            'end_date' => 'datetime:d/m/Y',
            'start_time' => 'datetime: H:i',

        ];
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
