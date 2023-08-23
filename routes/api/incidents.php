<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidentController;

/*
|--------------------------------------------------------------------------
| API Routes Incidents
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de roles
| y los permisos de la aplicación siguiendo ciertos estandares
| además de estar alejadas de las demás para manejar un orden estructurado
|
*/

Route::middleware(['jwt.verify'])->group(function() {
    /**
     * Manejo de Incidents
     */
    Route::get('incident/index', [IncidentController::class, 'index']);
    Route::post('incident/store', [IncidentController::class, 'store']);
    Route::get('incident/show/{incident}', [IncidentController::class, 'show']);
    Route::post('incident/update/{id}', [IncidentController::class, 'update']);
    Route::post('incident/destroy/{id}', [IncidentController::class, 'destroy']);
});