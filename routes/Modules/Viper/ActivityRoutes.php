<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\Viper\ActivityController;

/*
|--------------------------------------------------------------------------
| API Routes Activity 
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de actividades en el proyecto
|
*/

Route::prefix('/viper/activity')->group(function () {
    Route::get('/list/deliverable/{deliverableId}', [ActivityController::class, 'index']);
    Route::get('/get/{activityId}', [ActivityController::class, 'show']);
    Route::get('/listActivityByProduct/{productId}', [ActivityController::class, 'display']);
    Route::get('/listActivityByProject/{projectId}', [ActivityController::class, 'view']);
    Route::get('/listProgresActivityByProject/{projectId}', [ActivityController::class, 'exhibit']);
    Route::post('/create', [ActivityController::class, 'store']);
    Route::put('/update/{activityId}', [ActivityController::class, 'update']);
    Route::delete('/delete/{activityId}', [ActivityController::class, 'destroy']);
});