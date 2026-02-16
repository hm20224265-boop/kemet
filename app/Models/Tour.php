<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'destination_id',
        'trip_type_id',
        'trip_number',
        'price',
        'description',
        'image',
        'trip_duration',
        'rating'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function tripType()
    {
        return $this->belongsTo(TripType::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
