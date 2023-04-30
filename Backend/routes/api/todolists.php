<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;
 //protected routes (you need a token to access them
Route::group(['middleware'=>['auth:sanctum']],function() {
    Route::put('/todolists/{todolist}',[TodolistController::class,'update'])->name('update');

    Route::patch('/todolists/{todolist}',[TodolistController::class,'update'])->name('update');

    Route::delete('/todolists/{todolist}',[TodolistController::class,'destroy'])->name('destroy');

    Route::post('/users/{user}/todolists',[TodolistController::class,'store'])->name('store');
});

//Public Routes
Route::get('/todolists',[TodolistController::class,'index'])->name('index');

Route::get('/todolists/{todolist}',[TodolistController::class,'show'])->name('show');





