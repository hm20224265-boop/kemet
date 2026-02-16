<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'governorate_name',
        'description'
    ];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
