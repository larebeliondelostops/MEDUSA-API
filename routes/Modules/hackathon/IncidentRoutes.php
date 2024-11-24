<?php

use App\Http\Controllers\Modules\hackathon\IncidentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ActivityControlController;


Route::prefix('/hackathon/incident')->group(function () {
    Route::get('/', [IncidentController::class, 'index']);
    Route::get('/{id}', [IncidentController::class, 'show']);
    Route::post('/', [IncidentController::class, 'store']);
    Route::put('/{id}', [IncidentController::class, 'update']);
    Route::delete('/{id}', [IncidentController::class, 'destroy']);
});