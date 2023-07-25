<?php

use App\Http\Controllers\EntitiesController;
use App\Http\Controllers\MovementEntitiesController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes Entities
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de entidades
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de entidades
     */
    Route::get('entities/all', [EntitiesController::class, 'all']); // Obtener todos los campos de la tabla entidades
    Route::post('entities/store', [EntitiesController::class, 'store']); // Agregar un campo en la tabla entidades
    Route::put('entities/update/{id}', [EntitiesController::class, 'update']); // editar un campo en la tabla entidades
    Route::delete('entities/destroy/{id}', [EntitiesController::class, 'destroy']); // editar un campo en la tabla entidades

    Route::apiResource('/entities/movement', MovementEntitiesController::class);
});