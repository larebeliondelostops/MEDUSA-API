<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\ProjectController;

Route::post('/viper/project/create', [ProjectController::class, 'store']);
Route::put('/viper/project/update/{bpin}', [ProjectController::class, 'update']);
Route::get('/viper/project/list', [ProjectController::class, 'index']);
Route::get('/viper/project/get/{bpin}', [ProjectController::class, 'show']);
Route::delete('/viper/project/delete/{bpin}', [ProjectController::class, 'destroy']);