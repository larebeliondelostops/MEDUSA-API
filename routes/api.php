<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    $data = [
        'message' => "Welcome to our API"
    ];
    return response()->json($data, 200);
});

Route::post('/import/excel', [ImportExcelController::class, 'import']);

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/user', [AuthController::class, 'getUser']);

Route::middleware('jwt.verify')->group(function () {

    Route::post('auth/refresh', [AuthController::class, 'refresh']);

    Route::get('tipo_evento/all', [EventTypeController::class, 'allEventTypes']);
    Route::get('tipo_evento/{id}', [EventTypeController::class, 'getEventType']);
    Route::post('tipo_evento/create', [EventTypeController::class, 'createEventType']);
    Route::put('tipo_evento/update/{id}', [EventTypeController::class, 'updateEventType']);
    Route::delete('tipo_evento/delete/{id}', [EventTypeController::class, 'deleteEventType']);

    Route::post('evento/create', [EventController::class, 'createEvent']);
    Route::get('evento/all', [EventController::class, 'getAllEvents']);
    Route::get('evento/tipo_evento', [EventController::class, 'getEventsType']);
    Route::get('evento/date', [EventController::class, 'getEventsForDate']);

    Route::get('/dashboard', function () {
        return response()->json(['message' => 'Welcome to dashboard'], 200);
    });
});
