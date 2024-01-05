<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viper\ProjectController;

Route::post('/viper/create', [ProjectController::class, 'create']);