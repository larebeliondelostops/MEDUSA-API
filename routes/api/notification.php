<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationAppController;

/*
|--------------------------------------------------------------------------
| API Routes Notificaciones
|--------------------------------------------------------------------------
|
| Aqui estarán todas las rutas relacionadas con el manejo de menu's
| y los permisos de la aplicación siguiendo ciertos estandares
| además de estar alejadas de las demás para manejar un orden estructurado
|
*/

Route::middleware([/* 'jwt.verify' *//* , 'role:Administrador' */])->group(function() {

    Route::post('/notify', [NotificationAppController::class, 'sendNotification']);
    Route::post('/notify/add-device', [NotificationAppController::class, 'addDevice']);
    Route::post('/notify/update-notification-status', [NotificationAppController::class, 'updateNotificationStatus']);
    Route::get('/notify/device-info/{username}', [NotificationAppController::class, 'getDeviceInfo']);
});

