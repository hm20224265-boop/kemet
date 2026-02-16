<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    protected $fillable = [
        'title',
        'name',
        'image',
        'tag',
        'trip_date',
        'description'
    ];
}

