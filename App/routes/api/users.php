<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Public routes
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');

//Protected routes
Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});



