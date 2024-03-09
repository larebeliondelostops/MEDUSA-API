<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ditra\DataDitra;
use App\Models\Ditra\Incident;
use App\Models\CriminalActs;
use App\Models\Ipats;

use App\Http\Controllers\HeatmapController;

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

    Route::get('/heatmap', [HeatmapController::class, 'index']);

    /* Route::get('/heatmap', function () {
        $data = CriminalActs::select('coordinates')->get();
    
        $features = [];
        foreach ($data as $row) {
            $coordinates = json_decode($row->coordinates);
            $feature = [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [
                        $coordinates->lat,
                        $coordinates->lng
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
    }); */

    //villavicencio

    /* Route::get('/heatmap', function () {
        
        $data = Ipats::select('coordinates')->get();

        $features = [];
        foreach ($data as $row) {
            $coordenadas = explode(', ', $row->coordinates);
    
            $latitud = (float)$coordenadas[1];
            $longitud = (float)$coordenadas[0];
    
            $feature = [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [
                        $longitud, $latitud
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
    }); */
});

