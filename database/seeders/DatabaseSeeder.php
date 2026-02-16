<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
public function run(): void
{
    // 1. إضافة وجهات (Destinations)
    $luxor = \App\Models\Destination::create([
        'governorate_name' => 'الأقصر',
        'description' => 'مدينة الألف باب، تضم ثلث آثار العالم.',
        'image' => 'destinations/luxor.jpg'
    ]);

    $aswan = \App\Models\Destination::create([
        'governorate_name' => 'أسوان',
        'description' => 'بلاد الذهب والنيل الساحر والمناظر الطبيعية.',
        'image' => 'destinations/aswan.jpg'
    ]);

    // 2. إضافة أنواع رحلات (Trip Types)
    $cultural = \App\Models\TripType::create([
        'name' => 'Cultural',
        'title' => 'رحلات ثقافية',
        'link' => 'cultural-trips',
        'description' => 'استكشف التاريخ والحضارة المصرية القديمة.'
    ]);

    $adventure = \App\Models\TripType::create([
        'name' => 'Adventure',
        'title' => 'رحلات مغامرة',
        'link' => 'adventure-trips',
        'description' => 'رحلات السفاري والتخييم في الصحراء.'
    ]);

    // 3. إضافة رحلات (Tours)
    \App\Models\Tour::create([
        'destination_id' => $luxor->id,
        'trip_type_id' => $cultural->id,
        'trip_number' => 'TRP-550',
        'price' => 1500.00,
        'description' => 'جولة كاملة في معبد الكرنك ووادي الملوك.',
        'trip_duration' => 3,
        'rating' => 4.5,
        'image' => 'tours/luxor_tour.jpg'
    ]);

    \App\Models\Tour::create([
        'destination_id' => $aswan->id,
        'trip_type_id' => $adventure->id,
        'trip_number' => 'TRP-660',
        'price' => 2000.00,
        'description' => 'رحلة بالفلوكة في النيل وزيارة قرية النوبة.',
        'trip_duration' => 2,
        'rating' => 5.0,
        'image' => 'tours/aswan_tour.jpg'
    ]);

    // 4. إضافة باقات سفر (Travel Packages)
    \App\Models\TravelPackage::create([
        'title' => 'باكيدج العائلة',
        'name' => 'Family Offer',
        'tag' => 'offer',
        'trip_date' => '2026-06-15',
        'description' => 'خصم خاص للعائلات الكبيرة شامل الانتقالات.',
        'image' => 'packages/family.jpg'
    ]);

    // 5. إضافة مستخدم وتقييم (User & Review)
    $user = \App\Models\User::create([
        'first_name' => 'أحمد',
        'last_name' => 'محمد',
        'email' => 'ahmed@example.com',
        'password' => bcrypt('password123'),
        'phone' => '01012345678'
    ]);

    \App\Models\Review::create([
        'user_id' => $user->id,
        'tour_id' => 1,
        'comment' => 'كانت تجربة مذهلة جداً والتنظيم كان رائعاً!',
        'evaluation' => 5
    ]);
}
}
