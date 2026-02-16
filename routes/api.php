<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\HomeController;

// ------------------------
// Public Routes (مسارات عامة)
// ------------------------

// روت الهوم الأساسي (متاح للجميع)
Route::get('home', [HomeController::class, 'index']);

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('google-login', [AuthController::class, 'googleLogin']);
    Route::post('facebook-login', [AuthController::class, 'facebookLogin']);
});

// ------------------------
// Protected Routes (مسارات محمية)
// ------------------------
Route::middleware('auth:sanctum')->group(function () {
    
    // Auth
    Route::post('auth/logout', [AuthController::class, 'logout']);

    // Users
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
});