<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;


Route::get('/todolists',[TodolistController::class,'index'])->name('index');


Route::post('/users/{user_id}/todolists',[TodolistController::class,'store'])->name('store');

Route::get('/todolists/{todolist}',[TodolistController::class,'show'])->name('show');

Route::put('/todolists/{todolist}',[TodolistController::class,'update'])->name('update');

Route::patch('/todolists/{todolist}',[TodolistController::class,'update'])->name('update');

Route::delete('/todolists/{todolist}',[TodolistController::class,'destroy'])->name('destroy');
