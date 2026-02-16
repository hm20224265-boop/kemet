<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Destination;
use App\Models\TripType;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // 1. الوجهات (تأكدي من وجود بيانات في جدول destinations)
            $destinations = Destination::select('id', 'governorate_name', 'description', 'image')->limit(6)->get();

            // 2. الرحلات (تم تعديل rating للحروف الصغيرة)
            $featuredTours = Tour::with(['destination', 'tripType'])
                ->orderBy('rating', 'desc') 
                ->limit(8)
                ->get();

            // 3. أنواع الرحلات (تم اختيار الحقول الموجودة في المايجريشن الخاص بكِ)
            $categories = TripType::select('id', 'name', 'title', 'link')->get();

            // 4. الباقات المميزة (بناءً على الـ tag)
            $specialPackages = TravelPackage::where('tag', 'offer')
                ->orWhere('tag', 'Hot Offer') // أضفت هذا الاحتمال لضمان ظهور بيانات
                ->limit(3)
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Home page data retrieved successfully',
                'data' => [
                    'destinations' => $destinations,
                    'tours' => $featuredTours,
                    'trip_types' => $categories, // غيرنا الاسم ليكون أدق للـ ERD
                    'packages' => $specialPackages
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error fetching data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}