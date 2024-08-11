<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\DofaPlanningController;

Route::prefix('/viper/dofaPlanning')->group(function () {
    Route::post('/create', [DofaPlanningController::class, 'store']);
    Route::put('/update/{id}', [DofaPlanningController::class, 'update']);
    Route::get('/list', [DofaPlanningController::class, 'index']);
    Route::get('/detail/{id}', [DofaPlanningController::class, 'show']);
    Route::delete('/delete/{id}', [DofaPlanningController::class, 'destroy']);
});
