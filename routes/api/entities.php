<?php

use App\Http\Controllers\EntitiesController;
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
     * Manejo de entidades
     */
    Route::post('entities/all', [EntitiesController::class, 'all']); // Obtener todos los campos de la tabla entidades
    Route::post('entities/store', [EntitiesController::class, 'store']); // Agregar un campo en la tabla entidades
    Route::post('entities/update/{id}', [EntitiesController::class, 'update']); // editar un campo en la tabla entidades
    Route::post('entities/destroy/{id}', [EntitiesController::class, 'destroy']); // editar un campo en la tabla entidades
});