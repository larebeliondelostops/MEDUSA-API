<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\StateController;

Route::post('/viper/state/create', [StateController::class, 'store']);
Route::put('/viper/state/update/{id}', [StateController::class, 'update']);
Route::get('/viper/state/list', [StateController::class, 'index']);
Route::get('/viper/state/get/{id}', [StateController::class, 'show']);
Route::delete('/viper/state/delete/{id}', [StateController::class, 'destroy']);
