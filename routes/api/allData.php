<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllDataController;

/*
|--------------------------------------------------------------------------
| API Routes All Data
|--------------------------------------------------------------------------
|
| Aqui se manejan los endpoints para el acceso masivo a la data
|
*/

Route::middleware([/* 'jwt.verify' */])->group(function() {
    /**
     * Manejo de data
     */
    Route::get('allData/allPoints', [AllDataController::class, 'allPoints']);
    Route::get('allData/allLines', [AllDataController::class, 'allLines']);
    Route::get('allData/allPolygons', [AllDataController::class, 'allPolygons']);
});