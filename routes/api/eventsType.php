<?php

use App\Http\Controllers\EventTypeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes EventsType
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de tipo de eventos
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function () {
    /**
     * Manejo de tipo de eventos
     */

    Route::get('tipo_evento/all', [EventTypeController::class, 'allEventTypes']);
    Route::get('tipo_evento/{id}', [EventTypeController::class, 'getEventType']);
    Route::post('tipo_evento/create', [EventTypeController::class, 'createEventType']);
    Route::put('tipo_evento/update/{id}', [EventTypeController::class, 'updateEventType']);
    Route::delete('tipo_evento/delete/{id}', [EventTypeController::class, 'deleteEventType']);
});
