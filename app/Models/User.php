<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * الخصائص التي يمكن تعبئتها (Mass Assignable)
     * تم إضافة start_date و end_date بناءً على الـ ERD
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'role_admin',
        'start_date',
        'end_date',
    ];

    /**
     * الخصائص التي يجب إخفاؤها عند تحويل الموديل إلى JSON (لأمان الـ API)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * تحويل القيم إلى أنواع بيانات محددة
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'start_date' => 'date',
        'end_date' => 'date',
        'role_admin' => 'boolean', // لأنها تمثل دور (Admin or not)
    ];

   
    public function bookings() 
    {
        return $this->hasMany(Booking::class, 'user_id');
    }


    
    public function reviews() 
    {
        return $this->hasMany(Review::class, 'user_id');
    }
}
