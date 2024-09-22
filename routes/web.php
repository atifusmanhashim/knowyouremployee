<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/login',[LoginController::class,'index']);
