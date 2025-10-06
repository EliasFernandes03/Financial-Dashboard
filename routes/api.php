<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/dashboard/index/{user_id}', [DashboardController::class, 'index']);
Route::post('/store', [DashboardController::class, 'store']);
Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});


