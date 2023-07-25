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

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de entidades
     */
    Route::get('alarms/all', [AlarmsController::class, 'all']); // Obtener todos los campos de la tabla entidades
    Route::post('alarms/store', [AlarmsController::class, 'store']); // Agregar un campo en la tabla entidades
    Route::put('alarms/update/{id}', [AlarmsController::class, 'update']); // editar un campo en la tabla entidades
    Route::delete('alarms/destroy/{id}', [AlarmsController::class, 'destroy']); // editar un campo en la tabla entidades
});