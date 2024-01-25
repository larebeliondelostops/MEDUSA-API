<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\MeasurementUnitController;

/*
|--------------------------------------------------------------------------
| API Routes MeasurementUnit
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de MeasurementUnits en el proyecto
|
*/

Route::prefix('/viper/measurement-unit')->group(function () {
    Route::get('/list', [MeasurementUnitController::class, 'index']);
    Route::get('/get/{MeasurementUnitId}', [MeasurementUnitController::class, 'show']);
    Route::post('/create', [MeasurementUnitController::class, 'store']);
    Route::put('/update/{MeasurementUnitId}', [MeasurementUnitController::class, 'update']);
    Route::delete('/delete/{MeasurementUnitId}', [MeasurementUnitController::class, 'destroy']);
});

