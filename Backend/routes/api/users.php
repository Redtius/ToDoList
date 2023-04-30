<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Public routes
Route::post('/register',[AuthController::class,'register'])->name('register');


