<?php

use App\Http\Controllers\HealthController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes Roles
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de roles
| y los permisos de la aplicación siguiendo ciertos estandares
| además de estar alejadas de las demás para manejar un orden estructurado
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de centros de salud
     */
    Route::post('health/all', [HealthController::class, 'all']); // Obtener todos los campos de la tabla salud
    Route::post('health/store', [HealthController::class, 'store']); // Agregar un campo en la tabla salud
    Route::post('health/update/{id}', [HealthController::class, 'update']); // editar un campo en la tabla salud
    Route::post('health/destroy/{id}', [HealthController::class, 'destroy']); // editar un campo en la tabla salud
});