<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripType extends Model
{
    protected $fillable = [
        'title',
        'address',
        'description',
        'link'
    ];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}

