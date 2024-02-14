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
            // Suponiendo que las coordenadas están en formato "latitud,longitud"
            $coordinates = explode(',', $row->coordinates);
            
            $feature = [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    'coordinates' => [
                        isset($coordinates[0]) && $coordinates[0] !== '' ? floatval($coordinates[0]) : null,
                        isset($coordinates[1]) && $coordinates[1] !== '' ? floatval($coordinates[1]) : null
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
});

