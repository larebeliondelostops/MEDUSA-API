<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ControlPanelController;

Route::prefix('/viper/controlPanel')->group(function () {
    Route::get('/listByStageControl/{stageControlId}', [ControlPanelController::class, 'index']);
    Route::get('/listAllByStageControl', [ControlPanelController::class, 'display']);
    Route::get('/get/{id}', [ControlPanelController::class, 'show']);
    Route::post('/create', [ControlPanelController::class, 'store']);
    Route::put('/update/{id}', [ControlPanelController::class, 'update']);
    Route::delete('/delete/{id}', [ControlPanelController::class, 'destroy']);
});

