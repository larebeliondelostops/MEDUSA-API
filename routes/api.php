<?php

use App\Http\Controllers\AllDataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\ImportKMZController;
use App\Http\Controllers\NotificationAppController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\CriminalActs;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider Swithin a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    $data = [
        'message' => "Welcome to our API"
    ];
    return response()->json($data, 200);
});


Route::get('/correlacionador', function (Request $request) {
    // Obtén el valor de la variable 'query' de la petición
        $query = $request->input('query');

        // Verifica si se proporcionó un valor para 'query'
        if (!$query) {
            return response()->json(['error' => 'La variable "query" es requerida.'], 400);
        }

        // Llama al endpoint externo con la variable 'query'
        $response = Http::get('https://probabilistico.medusaapi.online/correlacionador', [
            'query' => $query,
        ]);

        // Devuelve la respuesta del endpoint externo
        return $response->json();
});

Route::post('/import/excel', [ImportExcelController::class, 'import']);

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/user', [AuthController::class, 'getUser']);

Route::middleware('jwt.verify')->group(function () {
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::post('auth/validateToken', [AuthController::class, 'validateToken']);
    Route::post('auth/refresh', [AuthController::class, 'refresh']);

    Route::get('tipo_evento/all', [EventTypeController::class, 'allEventTypes']);
    Route::get('tipo_evento/{id}', [EventTypeController::class, 'getEventType']);
    Route::post('tipo_evento/create', [EventTypeController::class, 'createEventType']);
    Route::put('tipo_evento/update/{id}', [EventTypeController::class, 'updateEventType']);
    Route::delete('tipo_evento/delete/{id}', [EventTypeController::class, 'deleteEventType']);

    Route::get('/dashboard', function () {
        return response()->json(['message' => 'Welcome to dashboard'], 200);
    });
});


Route::post('/notify/{deviceToken}/{message}', [NotificationAppController::class, 'sendNotification']);
Route::post('/notify/add-device', [NotificationAppController::class, 'addDevice']);
Route::post('/notify/update-notification-status', [NotificationAppController::class, 'updateNotificationStatus']);
Route::get('/notify/device-info/{username}', [NotificationAppController::class, 'getDeviceInfo']);