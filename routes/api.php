<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/google-login', [AuthController::class, 'googleLogin']);
Route::post('/facebook-login', [AuthController::class, 'facebookLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
