<?php

use App\Http\Controllers\Modules\Viper\TrackingMatrixController;
use Illuminate\Support\Facades\Route;

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
