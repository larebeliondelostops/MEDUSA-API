<?php

use App\Http\Controllers\HealthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes Health
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de centros de salud
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de centros de salud
     */
    Route::get('health/all', [HealthController::class, 'all']); // Obtener todos los campos de la tabla salud
    Route::post('health/store', [HealthController::class, 'store']); // Agregar un campo en la tabla salud
    Route::put('health/update/{id}', [HealthController::class, 'update']); // editar un campo en la tabla salud
    Route::delete('health/destroy/{id}', [HealthController::class, 'destroy']); // editar un campo en la tabla salud
});