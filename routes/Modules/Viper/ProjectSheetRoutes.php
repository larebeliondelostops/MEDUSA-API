<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ProjectSheetController;

Route::prefix('/viper/projectSheet')->group(function () {
    Route::post('/create', [ProjectSheetController::class, 'store']);
    Route::put('/update/{id}', [ProjectSheetController::class, 'update']);
    Route::get('/list/{phaseId}', [ProjectSheetController::class, 'index']);
    Route::get('/detail/{id}', [ProjectSheetController::class, 'show']);
    Route::delete('/delete/{id}', [ProjectSheetController::class, 'destroy']);
});
