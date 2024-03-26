<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes All Data
|--------------------------------------------------------------------------
|
| Aqui se manejan los endpoints para el acceso masivo a la data
|
*/


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