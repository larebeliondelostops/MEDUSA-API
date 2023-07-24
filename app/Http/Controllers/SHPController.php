<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shapefile\ShapefileReader;
use ShapeFile\ShapeFileException;
use TeamZac\LaravelShapefiles\Reader;

class SHPController extends Controller
{
    public function import(Request $request)
    {
        try {

            ini_set('memory_limit', '12G');
            ini_set('max_execution_time', 20000);

            $shapefile = new ShapefileReader(storage_path() . '/app/public/shp/MGN_ANM_DPTOS.shp');
            $Geometry = $shapefile->fetchRecord();
            $geoJsonGeometry = $Geometry->getGeoJSON();
            dd($geoJsonGeometry);
            // Crear un objeto Feature que incluya la geometría.
            $feature = [
                'type' => 'Feature',
                'geometry' => json_decode($geoJsonGeometry, true), // Convertir la cadena de texto JSON a un array.
                'properties' => [], // Puedes agregar aquí cualquier metadato asociado.
            ];

            // Convertir el objeto Feature a JSON.
            $geoJson = json_encode($feature);

            // Guardar el archivo en un directorio público.
            $file = public_path('MGN_ANM_DPTOS.json');
            file_put_contents($file, $geoJson);

        } catch (ShapeFileException $e) {
            echo $e->getMessage();
        }
    }
}
