<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\SpecificObjectiveController;

Route::post('/viper/specificobjectives/create', [SpecificObjectiveController::class, 'store']);
Route::put('/viper/specificobjectives/update/{id}', [SpecificObjectiveController::class, 'update']);
Route::get('/viper/specificobjectives/list', [SpecificObjectiveController::class, 'index']);
Route::get('/viper/specificobjectives/get/{id}', [SpecificObjectiveController::class, 'show']);
Route::delete('/viper/specificobjectives/delete/{id}', [SpecificObjectiveController::class, 'destroy']);
