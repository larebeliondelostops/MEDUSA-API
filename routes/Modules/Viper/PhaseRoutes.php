<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\PhaseController;

Route::prefix('/viper/phase')->group(function () {
    Route::post('/create', [PhaseController::class, 'store']);
    Route::put('/update/{id}', [PhaseController::class, 'update']);
    Route::get('/list', [PhaseController::class, 'index']);
    Route::get('/detail/{id}', [PhaseController::class, 'show']);
    Route::delete('/delete/{id}', [PhaseController::class, 'destroy']);
});
