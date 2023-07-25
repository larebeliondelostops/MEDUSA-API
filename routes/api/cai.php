<?php

use App\Http\Controllers\CaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes cai
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de entidades
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de entidades
     */
    Route::get('cai/all', [CaiController::class, 'all']); // Obtener todos los campos de la tabla entidades
    Route::post('cai/store', [CaiController::class, 'store']); // Agregar un campo en la tabla entidades
    Route::put('cai/update/{id}', [CaiController::class, 'update']); // editar un campo en la tabla entidades
    Route::delete('cai/destroy/{id}', [CaiController::class, 'destroy']); // editar un campo en la tabla entidades
});