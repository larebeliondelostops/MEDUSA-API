<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventController;
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

Route::get('/heatmap', function () {
    $data = CriminalActs::select('coordinates')->get();

    $features = [];
    foreach ($data as $row) {
        $coordinates = json_decode($row->coordinates);
        $feature = [
            "type" => "Feature",
            "geometry" => [
                "type" => "Point",
                "coordinates" => [
                    $coordinates->lng,
                    $coordinates->lat
                ]
            ]
        ];
        $features[] = $feature;
    }

    $geojson = [
        "type" => "FeatureCollection",
        "features" => $features
    ];

    return response()->json($geojson, 200);
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

Route::get('/ver-video1', function () {
    $videoPath = 'videos/trafico_1.mp4'; // Ruta relativa del video dentro de la carpeta "public/storage"
    $filePath = Storage::disk('public')->path($videoPath);
    return response()->file($filePath);
});

Route::get('/ver-video2', function () {
    $videoPath = 'videos/trafico_2.mp4'; // Ruta relativa del video dentro de la carpeta "public/storage"
    $filePath = Storage::disk('public')->path($videoPath);
    return response()->file($filePath);
});

Route::get('/ver-video3', function () {
    $videoPath = 'videos/trafico_3.mp4'; // Ruta relativa del video dentro de la carpeta "public/storage"
    $filePath = Storage::disk('public')->path($videoPath);
    return response()->file($filePath);
});

Route::get('/ver-video4', function () {
    $videoPath = 'videos/trafico_4.mp4'; // Ruta relativa del video dentro de la carpeta "public/storage"
    $filePath = Storage::disk('public')->path($videoPath);
    return response()->file($filePath);
});