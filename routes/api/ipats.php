<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ditra\DataDitra;
use App\Models\Ditra\Incident;
use App\Models\CriminalActs;
use App\Models\Ipats;

use App\Http\Controllers\IpatsController;

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



Route::middleware(['jwt.verify'/* , 'role:Administrador' */])->group(function() {

    Route::post('/SaveIpats', [IpatsController::class, 'SaveIpats']);

});

