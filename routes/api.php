<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\EventoController;
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

    Route::get('tipo_evento/all', [TipoEventoController::class, 'allTipoEventos']);
    Route::get('tipo_evento/{id}', [TipoEventoController::class, 'getTipoEvento']);
    Route::post('tipo_evento/create', [TipoEventoController::class, 'createTipoEvento']);
    Route::put('tipo_evento/update/{id}', [TipoEventoController::class, 'updateTipoEvento']);
    Route::delete('tipo_evento/delete/{id}', [TipoEventoController::class, 'deleteTipoEvento']);

    Route::post('evento/create', [EventoController::class, 'createEvent']);
    Route::get('evento/all', [EventoController::class, 'getAllEvents']);
    Route::get('evento/tipo_evento', [EventoController::class, 'getTipoEvents']);
    Route::get('evento/date', [EventoController::class, 'getEventsForDate']);

    Route::get('/dashboard', function () {
        return response()->json(['message' => 'Welcome to dashboard'], 200);
    });
});
