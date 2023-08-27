<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Values\EventCreateValues;
use App\Values\EventGetValues;
use App\Values\ReportsValues;
use App\Models\Event;
use App\Models\EventCoordinate;

/**
 * Controlador manejan todo lo que tiene que ver con el gestor de eventos
 *
 * Controlador que maneja el llamado a las strategias ya sea para crear, actualizar, eliminar o consultar eventos
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     Daniel Martinez <danielxz331@gmail.com>
 * @version    v1.0.0
 */

class EventController extends Controller
{

    //Metodo para traer todos los eventos
    public function getAllEvents()
    {

        try {

            $state = request()->input('state');

            $strategy = EventGetValues::STRATEGY[$state];

            return (new $strategy)->getAllEvents();
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    //Metodo para traer todos los eventos por tipo
    public function getEventsType(Request $request)
    {

        try {

            $state = request()->input('state');

            $strategy = EventGetValues::STRATEGY[$state];

            return (new $strategy)->getEventsType($request);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    //Metodo para traer todos los eventos por fecha
    public function getEventsForDate(Request $request)
    {

        try {

            $state = request()->input('state');

            $strategy = EventGetValues::STRATEGY[$state];

            return (new $strategy)->getEventsForDate($request);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    //Metodo para crear eventos
    public function createEvent(Request $request)
    {

        try {

            $state = $request->input('state');

            $strategy = EventCreateValues::STRATEGY[$state];

            return (new $strategy)->createEvent($request);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    //Metodo para eliminar eventos
    public function deleteEvent($id)
    {

        try {

            $Event = Event::find($id);

            if ($Event != null) {
                $this->deleteEventCoordinate($id);
                $Event->delete();
                return request()->json(200, $Event);
            } else {
                return request()->json(400, "No se encontro el evento");
            }
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    //Metodo para eliminar coordenadas de eventos
    public function deleteEventCoordinate($id)
    {

        $EventCoordinate = EventCoordinate::where('eventId', $id)->first();

        $EventCoordinate->delete();
        return request()->json(200, $EventCoordinate);
    }

}
