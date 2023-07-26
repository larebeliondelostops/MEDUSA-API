<?php

use App\Http\Controllers\CamerasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes cameras
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de entidades
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de entidades
     */
    Route::get('cameras/all', [CamerasController::class, 'all']); // Obtener todos los campos de la tabla entidades
    Route::post('cameras/store', [CamerasController::class, 'store']); // Agregar un campo en la tabla entidades
    Route::put('cameras/update/{id}', [CamerasController::class, 'update']); // editar un campo en la tabla entidades
    Route::delete('cameras/destroy/{id}', [CamerasController::class, 'destroy']); // editar un campo en la tabla entidades
    Route::post('cameras/storeMax', [CamerasController::class, 'storeMax']);
});