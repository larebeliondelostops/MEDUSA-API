<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function allEvents()
    {
        $eventos = Evento::all();
        return request()->json(200, $eventos);
    }

    public function getEvent($id)
    {
        $evento = Evento::find($id);
        return request()->json(200, $evento);
    }

    public function createEvent(Request $request)
    {
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->lugar = $request->lugar;
        $evento->descripcion = $request->descripcion;
        $evento->save();
        return request()->json(200, $evento);
    }

    public function updateEvent(Request $request, $id)
    {
        $evento = Evento::find($id);
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora = $request->hora;
        $evento->lugar = $request->lugar;
        $evento->descripcion = $request->descripcion;
        $evento->save();
        return request()->json(200, $evento);
    }

    public function deleteEvent($id)
    {
        $evento = Evento::find($id);
        $evento->delete();
        return request()->json(200, $evento);
    }
}
