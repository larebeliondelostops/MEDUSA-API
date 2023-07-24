<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventType;
use Illuminate\Support\Facades\Response;

/**
 * Controlador manejan todo lo que tiene que ver con los tipos de eventos
 *
 * Controlador que maneja la logica para la creacion, actualizacion, eliminacion y consulta de los tipos de eventos
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     Daniel Martinez <danielxz331@gmail.com>
 * @version    v1.0.0
 */

class EventTypeController extends Controller
{
    //Metodo para traer todos los tipos de eventos
    public function allEventTypes()
    {
        $EventTypes = EventType::all();
        return request()->json(200, $EventTypes);
    }

    //Metodo para traer un tipo de evento por id
    public function getEventType($id)
    {
        $EventTypes = EventType::find($id);
        return request()->json(200, $EventTypes);
    }

    //Metodo para crear un tipo de evento
    public function createEventType(Request $request)
    {

        // Validación
        if (isset($request->validator) && $request->validator->fails()) {
            return Response::json([
                'code' => '2001',
                'status' => 'error',
                'message' => 'Datos Recibidos Incorrectos',
                'errors' => $request->validator->messages()
            ], 400, [], JSON_PRETTY_PRINT);
        }

        $EventTypes = new EventType();
        $EventTypes->eventName = $request->eventName;
        $EventTypes->eventDescription = $request->eventDescription;
        $EventTypes->save();
        return request()->json(200, $EventTypes);
    }

    //Metodo para actualizar un tipo de evento
    public function updateEventType(Request $request, $id)
    {
        $EventTypes = EventType::find($id);

        if ($request->eventName != null)
            $EventTypes->eventName = $request->eventName;

        if ($request->eventDescription != null)
            $EventTypes->eventDescription = $request->eventDescription;

        $EventTypes->save();
        return request()->json(200, $EventTypes);
    }

    //Metodo para eliminar un tipo de evento
    public function deleteEventType($id)
    {
        $EventTypes = EventType::find($id);
        $EventTypes->delete();
        return request()->json(200, $EventTypes);
    }
}
