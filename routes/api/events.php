<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes Events
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de eventos
|
*/

Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {
    /**
     * Manejo de eventos
     */

    Route::post('evento/create', [EventController::class, 'createEvent']);
    Route::get('evento/all', [EventController::class, 'getAllEvents']);
    Route::get('evento/tipo_evento', [EventController::class, 'getEventsType']);
    Route::get('evento/date', [EventController::class, 'getEventsForDate']);
    Route::delete('evento/delete/{id}', [EventController::class, 'deleteEvent']);

    //endpoints para reportes
    
    Route::get('evento/EventsForMonth', [EventController::class, 'EventsForMonth']); 
    Route::get('evento/EventsForType', [EventController::class, 'EventsForType']); 
    Route::get('evento/EventsPastAndFuture', [EventController::class, 'EventsPastAndFuture']); 
    Route::get('evento/EventsByAuthorizingEntity', [EventController::class, 'EventsByAuthorizingEntity']); 
    Route::get('evento/EventsByCapacityRange', [EventController::class, 'EventsByCapacityRange']); 
    Route::get('evento/EventsByTypeAndAuthorizingEntity', [EventController::class, 'EventsByTypeAndAuthorizingEntity']); 
});