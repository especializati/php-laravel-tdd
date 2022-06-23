<?php

use App\Http\Controllers\Api\{
    UserController
};
use Illuminate\Support\Facades\Route;

Route::put('/users/{email}', [UserController::class, 'update']);
Route::get('/users/{email}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);
