<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard/index/{user_id}', [DashboardController::class, 'index']);
    Route::post('/store', [DashboardController::class, 'store']);
    Route::get('/me', function (Request $request) {
        return $request->user();
    });
});