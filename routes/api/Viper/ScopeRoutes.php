<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\ScopeController;

Route::post('/viper/scopes/create', [ScopeController::class, 'store']);
Route::put('/viper/scopes/update/{id}', [ScopeController::class, 'update']);
Route::get('/viper/scopes/list', [ScopeController::class, 'index']);
Route::get('/viper/scopes/get/{id}', [ScopeController::class, 'show']);
Route::delete('/viper/scopes/delete/{id}', [ScopeController::class, 'destroy']);