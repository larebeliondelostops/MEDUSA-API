<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkersController;

/*
|--------------------------------------------------------------------------
| API Routes All Data
|--------------------------------------------------------------------------
|
| Aqui se manejan los endpoints para el acceso masivo a la data
|
*/

Route::middleware([/*'jwt.verify'*/])->controller(MarkersController::class)->group(function () {
    Route::get('allData/allPoints', 'allPoints');
    Route::get('allData/allLines', 'allLines');
    Route::get('allData/allPolygons', 'allPolygons');
    Route::get('allData/getInfoPoint', 'getInfoPoint');
});