<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\ProjectController;

Route::post('/viper/project/create', [ProjectController::class, 'create']);
Route::put('/viper/project/update/{bpin}', [ProjectController::class, 'update']);
Route::get('/viper/project/list', [ProjectController::class, 'list']);
Route::get('/viper/project/get/{bpin}', [ProjectController::class, 'get']);