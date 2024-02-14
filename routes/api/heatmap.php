<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationAppController;
use App\Models\Ditra\DataDitra;
use App\Models\Ditra\Incident;

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

    Route::get('/heatmap', function () {
        $data = DataDitra::select('coordinates')->get();
        $features = [];
        foreach ($data as $row) {
            $feature = [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    'coordinates' => $row->coordinates
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
});

