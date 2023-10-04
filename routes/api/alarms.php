<?php

use App\Http\Controllers\AlarmsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes alarms
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de entidades
|
*/

Route::middleware([/* 'jwt.verify' *//* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de entidades
     */
    Route::get('alarm/all', [AlarmsController::class, 'all']); // Obtener todos los campos de la tabla entidades
    Route::get('alarm/allTable', [AlarmsController::class, 'allTable']); // editar un campo en la tabla entidades
    Route::get('alarm/get/{id}', [AlarmsController::class, 'getOne']); // editar un campo en la tabla entidades
    Route::post('alarm/store', [AlarmsController::class, 'store']); // Agregar un campo en la tabla entidades
    Route::put('alarm/update/{id}', [AlarmsController::class, 'update']); // editar un campo en la tabla entidades
    Route::delete('alarm/destroy/{id}', [AlarmsController::class, 'destroy']); // editar un campo en la tabla entidades
    Route::post('alarm/storeMax', [AlarmsController::class, 'storeMax']); // Agregar un campo en la tabla entidades
});