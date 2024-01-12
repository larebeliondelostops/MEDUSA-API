<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\ProjectController;
use App\Http\Controllers\Viper\ScopeController;


Route::post('/viper/project/create', [ProjectController::class, 'store']);
Route::put('/viper/project/update/{bpin}', [ProjectController::class, 'update']);
Route::get('/viper/project/list', [ProjectController::class, 'index']);
Route::get('/viper/project/get/{bpin}', [ProjectController::class, 'show']);
Route::delete('/viper/project/delete/{bpin}', [ProjectController::class, 'destroy']);
Route::prefix('/viper/project')->group(function () {
    Route::post('/create', [ProjectController::class, 'store']);
    Route::put('/update/{bpin}', [ProjectController::class, 'update']);
    Route::get('/list', [ProjectController::class, 'index']);
    Route::get('/get/{bpin}', [ProjectController::class, 'show']);
    Route::delete('/delete/{bpin}', [ProjectController::class, 'destroy']);
});