<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ControlPanelProjectController;

Route::prefix('/viper/controlPanelProject')->group(function () {
    Route::get('/listByProject/{projectId}', [ControlPanelProjectController::class, 'index']);
    Route::get('/listByAllProject', [ControlPanelProjectController::class, 'display']);
    Route::get('/get/{id}', [ControlPanelProjectController::class, 'show']);
    Route::post('/create', [ControlPanelProjectController::class, 'store']);
    Route::put('/update/{id}', [ControlPanelProjectController::class, 'update']);
    Route::delete('/delete/{id}', [ControlPanelProjectController::class, 'destroy']);
});

