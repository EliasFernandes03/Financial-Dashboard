<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Dflydev\DotAccessData\Data;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/dashboard/index/{user_id}', [DashboardController::class, 'index']);
Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
    return $request->user();
});


