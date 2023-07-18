<?php

use App\Http\Controllers\EventController;
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

    Route::post('evento/create', [EventController::class, 'createEvent']);
    Route::get('evento/all', [EventController::class, 'getAllEvents']);
    Route::get('evento/tipo_evento', [EventController::class, 'getEventsType']);
    Route::get('evento/date', [EventController::class, 'getEventsForDate']);

    //endpoints para reportes
    
    Route::get('evento/EventsForMonth', [EventController::class, 'EventsForMonth']); 
    Route::get('evento/EventsForType', [EventController::class, 'EventsForType']); 
    Route::get('evento/EventsPastAndFuture', [EventController::class, 'EventsPastAndFuture']); 
    Route::get('evento/EventsByAuthorizingEntity', [EventController::class, 'EventsByAuthorizingEntity']); 
    Route::get('evento/EventsByCapacityRange', [EventController::class, 'EventsByCapacityRange']); 
    Route::get('evento/EventsByTypeAndAuthorizingEntity', [EventController::class, 'EventsByTypeAndAuthorizingEntity']); 
});