<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('login', 'AuthController@userLogin');      // User login
Route::post('admin/login', 'AuthController@adminLogin');  // Admin login

// User registration route
Route::post('register', [AuthController::class, 'userRegister']);

// Admin registration route
Route::post('admin/register', [AuthController::class, 'adminRegister']);
Route::middleware('auth:api')->group(function () {
    Route::get('/user/profile', 'UserController@profile');  // User protected route
});

Route::middleware('auth:admin-api')->group(function () {
    Route::get('/admin/profile', 'AdminController@profile');  // Admin protected route
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
