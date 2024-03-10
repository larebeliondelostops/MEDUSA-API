<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\StateController;

Route::prefix('/viper/state')->group(function () {
    Route::post('/create', [StateController::class, 'store']);
    Route::put('/update/{id}', [StateController::class, 'update']);
    Route::get('/list', [StateController::class, 'index']);
    Route::get('/get/{id}', [StateController::class, 'show']);
    Route::delete('/delete/{id}', [StateController::class, 'destroy']);
});
