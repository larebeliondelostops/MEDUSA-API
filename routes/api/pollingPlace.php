<?php

use App\Http\Controllers\PollingPlaceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes pollingPlace
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de entidades
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de entidades
     */
    Route::get('pollingPlace/all', [PollingPlaceController::class, 'all']); // Obtener todos los campos de la tabla entidades
    Route::get('pollingPlace/getOne/{id}', [pollingPlaceController::class, 'getOne']); // editar un campo en la tabla entidades
    Route::get('pollingPlace/allTable', [pollingPlaceController::class, 'allTable']); // editar un campo en la tabla entidades
    Route::post('pollingPlace/store', [PollingPlaceController::class, 'store']); // Agregar un campo en la tabla entidades
    Route::put('pollingPlace/update/{id}', [PollingPlaceController::class, 'update']); // editar un campo en la tabla entidades
    Route::delete('pollingPlace/destroy/{id}', [PollingPlaceController::class, 'destroy']); // editar un campo en la tabla entidades
    Route::post('pollingPlace/storeMax', [PollingPlaceController::class, 'storeMax']);
});