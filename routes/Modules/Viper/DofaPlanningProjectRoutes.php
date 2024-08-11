<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\DofaPlanningProjectController;

Route::prefix('/viper/dofaPlanningProject')->group(function () {
    Route::post('/create', [DofaPlanningProjectController::class, 'store']);
    Route::put('/update/{id}', [DofaPlanningProjectController::class, 'update']);
    Route::get('/list/{projectId}', [DofaPlanningProjectController::class, 'index']);
    Route::get('/detail/{id}', [DofaPlanningProjectController::class, 'show']);
    Route::delete('/delete/{id}', [DofaPlanningProjectController::class, 'destroy']);
});
