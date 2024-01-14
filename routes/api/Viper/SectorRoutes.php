<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\SectorController;

Route::prefix('/viper/sector')->group(function () {
    Route::post('/create', [SectorController::class, 'store']);
    Route::put('/update/{id}', [SectorController::class, 'update']);
    Route::get('/list', [SectorController::class, 'index']);
    Route::delete('/delete/{id}', [SectorController::class, 'destroy']);
});
