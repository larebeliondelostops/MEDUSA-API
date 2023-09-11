<?php

namespace App\Http\Controllers;

use Exception;
use App\Values\AllDataValues;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class AllDataController extends Controller
{
    /**
     * Variable para almacenar todos los marcadores cuyo contenido se basa en puntos
     */
    private $pointsMarkers = [1, 2, 3, 4, 50, 54];

    /**
     * Variable para almacenar todos los marcadores cuyo contenido se basa en puntos
     */
    private $polygonsMarkers = [55];

    /**
     * Variable para almacenar todos los puntos
     */
    private $points = [];

    /**
     * Variable para almacenar todos los ppoligonos
     */
    private $polygons = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPoints()
    {
        try {

            foreach ($this->pointsMarkers as $key) {
                $data = AllDataValues::STRATEGY[$key]::all();
                $data = json_decode($data->content(), true);
                $this->points = array_merge($this->points, $data);
            }

            return Response::json($this->points, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPolygons()
    {
        try {

            foreach ($this->polygonsMarkers as $key) {
                $strategy = AllDataValues::STRATEGY[$key];
                $strategy = new $strategy();
                $data = $strategy->getAllEvents();
                $data = json_decode($data->content(), true);
                $this->polygons = array_merge($this->polygons, $data);
            }

            return Response::json($this->polygons, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
