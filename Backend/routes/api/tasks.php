<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

//Protected Routes
Route::group(['middleware'=>['auth:sanctum']],function (){
    Route::post('/todolists/{list_id}/tasks',[TaskController::class,'store'])->name('store');

    Route::post('/{task}/{status}',[TaskController::class,'Togglestatus'])->name('Togglestatus');

    Route::put('/tasks/{task}',[TaskController::class,'update'])->name('update');

    Route::patch('/tasks/{task}',[TaskController::class,'update'])->name('update');

    Route::delete('/tasks/{task}',[TaskController::class,'destroy'])->name('destroy');

    Route::get('/{listid}/tasks',[TaskController::class,'index'])->name('index');
});

//public routes



Route::get('/tasks/{task}',[TaskController::class,'show'])->name('show');

