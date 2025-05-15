<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'name', 'brand', 'model', 'year', 'car_type', 'daily_rent_price', 'availability', 'image',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function isAvailable($start, $end)
    {
        return !$this->rentals()
            ->where('status', '!=', 'canceled')
            ->where(function ($query) use ($start, $end) {
                $query->where('start_date', '<', $end)
                      ->where('end_date', '>', $start);
            })->exists();
    }
}
