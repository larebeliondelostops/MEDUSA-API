<?php

namespace App\Http\Controllers;

use App\Models\AvlHistoryCoordinates;
use App\Models\Ditra\AvlHistory;
use App\Models\UnitsHistoryCoordinates;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MovementEntitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $rutaArchivo = public_path('js/GeoJson/movement-entities.json');
            $contenidoArchivo = File::get($rutaArchivo);

            return Response::json([
                'code' => '200',
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
                'data' => json_decode($contenidoArchivo)
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function avlHistory()
    {
        try{
            // Inicializa una colección vacía para acumular los resultados
            $accumulatedResults = [];

            // Procesa los registros en lotes de 100
            AvlHistory::select('imei', 'latitud', 'longitud')
                ->orderBy('fecha_gps', 'desc')
                ->chunk(10000, function ($historicals) use (&$accumulatedResults) {
                    // Agrupa los registros del lote actual por 'imei'

                    foreach ($historicals as $historical)
                    {
                        if (array_key_exists($historical->imei, $accumulatedResults)) {
                            $accumulatedResults[$historical->imei] = $accumulatedResults[$historical->imei] . ', [' . str_replace(",", ".", $historical->latitud) . ',' . str_replace(",", ".", $historical->longitud). ']' ;
                        } else {
                            $accumulatedResults[$historical->imei] = '[[' . str_replace(",", ".", $historical->latitud) . ',' . str_replace(",", ".", $historical->longitud) . ']';
                        }
                    }
                });
            //dd($accumulatedResults);
            foreach ($accumulatedResults as $imei => $accumulatedResult)
            {
                DB::insert('insert into avl_history_coordinates (imei, position) values (?, ?)', [$imei, $accumulatedResult . ']']);
            }

            return Response::json([
                'status'=> 'succes',
                'message' => 'Solicitud exitosa',
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public static function avlPosition()
    {
        try{
            $historicos = AvlHistoryCoordinates::orderBy('imei', 'desc')->get();

            $posiciones = [];

            foreach ($historicos as $historico)
            {

                $array = json_decode($historico->position, true);

                $posiciones[] = ['id' => $historico->imei, 'position' => $array[0]];

            }

            return $posiciones;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public static function avlUnits()
    {
        try{
            $historicos = AvlHistoryCoordinates::orderBy('imei', 'desc')->get();

            $avl = [];

            foreach ($historicos as $historico)
            {

                $array = json_decode($historico->position, true);

                //$posiciones[] = ['id' => $historico->imei, 'position' => $array[0]];

                $avl[] = [
                    "markerType" => 54,
                    "id" => $historico->imei,
                    "title" => AvlHistory::select('nombre_uniformado')->where('imei', $historico->imei)->first()->nombre_uniformado,
                    "unitType" => 3,
                    "geometry" => [
                        "type" => "Point",
                        "coordinates" => $array[0]
                    ],
                    "properties" => [
                        "active" => true
                    ]
                ];

            }

            return $avl;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public static function villavoPosition()
    {
        try{
            $historicos = UnitsHistoryCoordinates::orderBy('id', 'desc')->get();

            $posiciones = [];

            foreach ($historicos as $historico)
            {

                $array = json_decode($historico->position, true);

                $posiciones[] = ['id' => $historico->id, 'position' => $array[0]];

            }

            return $posiciones;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public static function villavoUnits()
    {
        try{
            $historicos = UnitsHistoryCoordinates::orderBy('id', 'desc')->get();

            $units = [];

            foreach ($historicos as $historico)
            {

                $array = json_decode($historico->position, true);

                $units[] = [
                    "markerType" => 54,
                    "id" => $historico->id,
                    "title" => $historico->title,
                    "unitType" => $historico->unit_type,
                    "geometry" => [
                        "type" => "Point",
                        "coordinates" => $array[0]
                    ],
                    "properties" => [
                        "active" => true
                    ]
                ];

            }

            return $units;
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function getDataWaze()
    {
        try {

            $json_string = file_get_contents('waze.json');

            $data = json_decode($json_string, true);

            $tipos = collect($data['alerts'])->groupBy('type');

            $firstOfEachGroup = $tipos->map(function ($items) {
                return $items->first();
            });

            return Response::json([
                'message' => 'Solicitud exitosa',
                'data' => $firstOfEachGroup
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'message' => 'Error en la generación de la solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
