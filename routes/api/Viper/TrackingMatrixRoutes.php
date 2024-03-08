<?php

use App\Http\Controllers\Viper\TrackingMatrixController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\SubstateController;

/*
|--------------------------------------------------------------------------
| API Routes TrackingMatrix
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de la matriz de seguimiento
|
*/

Route::prefix('/viper/trackingMatrix')->group(function () {
    Route::get('/get/{projectBpin}', [TrackingMatrixController::class, 'show']);
});
