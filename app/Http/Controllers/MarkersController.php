<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Interfaces\Markers\MarkersInterface;

class MarkersController extends Controller
{
    /**
     * MarkersController constructor.
     */
    public function __construct(
        private MarkersInterface $service
    ){}

    /**
     * Obtener todos los puntos de los marcadores
     *
     * @return \Illuminate\Http\Response
     */
    public function allPoints()
    {
        try {

            $points = $this->service->allPoints();

            return Response::json($points, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => 'Error En La Generación De La Solicitud',], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Obtener todas las lineas de los marcadores
     *
     * @return \Illuminate\Http\Response
     */
    public function allLines()
    {
        try {

            $lines = $this->service->allPoints();

            return Response::json($lines, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => 'Error En La Generación De La Solicitud',], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Obtiene todos los poligonos de los marcadores
     *
     * @return \Illuminate\Http\Response
     */
    public function allPolygons()
    {
        try {

            $polygons = $this->service->allPolygons();

            return Response::json($polygons, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => 'Error En La Generación De La Solicitud',], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Obtiene la información de un punto especifico
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function getInfoPoint()
    {
        try {

            $uuid = request()->input('id');
            $markerType = request()->input('markerType');

            $point = $this->service->getInfoPoint($uuid, $markerType);

            return Response::json($point, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json(['message' => 'Error En La Generación De La Solicitud',], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
