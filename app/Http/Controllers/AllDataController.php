<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Marker;
use App\Contexts\AllDataContext;
use DragonCode\Contracts\Cashier\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class AllDataController extends Controller
{
    /**
     * Variable para almacenar todos los marcadores cuyo contenido se basa en puntos
     */
    private $pointsMarkers = [];

    /**
     * Variable para almacenar todos los marcadores cuyo contenido se basa en lineas
     */
    private $LinesMarkers = [];

    /**
     * Variable para almacenar todos los marcadores cuyo contenido se basa en puntos
     */
    private $polygonsMarkers = [];

    /**
     * Variable para almacenar todos los puntos
     */
    private $points = [];

    /**
     * Variable para almacenar todas las lineas
     */
    private $lines = [];

    /**
     * Variable para almacenar todos los ppoligonos
     */
    private $polygons = [];

    /**
     * Variable para almacenar el contexto de la data
     */
    private $value;

    /**
     * AllDataController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPoints()
    {
        try {

            $this->getSubDomain();

            $this->pointsMarkers = Marker::whereIn('marker_type', [1,4])->pluck('id')->toArray();

            foreach ($this->pointsMarkers as $key) {
                $data = $this->value::STRATEGY[$key]::all();
                $data = json_decode($data->content(), true);
                $this->points = array_merge($this->points, $data);
            }

            return Response::json($this->points, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'.$exception->getMessage(),
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function allLines()
    {
        try {
            $this->getSubDomain();

            $this->LinesMarkers = Marker::whereIn('marker_type', [2,4])->pluck('id')->toArray();

            foreach ($this->LinesMarkers as $key) {
                $data = $this->value::STRATEGY_LINES[$key]::all();
                $data = json_decode($data->content(), true);
                $this->lines = array_merge($this->lines, $data);
            }

            return Response::json($this->lines, 200, [], JSON_PRETTY_PRINT);
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
            $this->getSubDomain();

            $this->polygonsMarkers = Marker::where('marker_type', 3)->pluck('id')->toArray();

            foreach ($this->polygonsMarkers as $key) {
                $strategy = $this->value::STRATEGY[$key];
                $strategy = new $strategy();
                $data = $strategy->all();
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

    public function getInfoPoint()
    {
        try {
            $this->getSubDomain();

            $uuid = request()->input('id');
            $markerType = request()->input('markerType');

            $strategy = $this->value::STRATEGY[$markerType];
            $strategy = new $strategy();
            $data = $strategy->getInfoPoint($uuid);
            $data = json_decode($data->content(), true);

            return Response::json($data, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'.$exception->getMessage()
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function getSubDomain()
    {
        $this->value = AllDataContext::VALUE[tenant('id')];
    }
}
