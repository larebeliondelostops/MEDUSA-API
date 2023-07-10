<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoEvento;

class TipoEventoController extends Controller
{
    public function allTipoEventos()
    {
        $tipo_eventos = TipoEvento::all();
        return request()->json(200, $tipo_eventos);
    }

    public function getTipoEvento($id)
    {
        $tipo_evento = TipoEvento::find($id);
        return request()->json(200, $tipo_evento);
    }

    public function createTipoEvento(Request $request)
    {

        $request->validate([
            'nombre_evento' => 'required',
            'descripcion_evento' => 'required',
        ]);

        $tipo_evento = new TipoEvento();
        $tipo_evento->nombre_evento = $request->nombre_evento;
        $tipo_evento->descripcion_evento = $request->descripcion_evento;
        $tipo_evento->save();
        return request()->json(200, $tipo_evento);
    }

    public function updateTipoEvento(Request $request, $id)
    {
        $tipo_evento = TipoEvento::find($id);
        $tipo_evento->nombre_evento = $request->nombre_evento;
        $tipo_evento->descripcion_evento = $request->descripcion_evento;
        $tipo_evento->save();
        return request()->json(200, $tipo_evento);
    }

    public function deleteTipoEvento($id)
    {
        $tipo_evento = TipoEvento::find($id);
        $tipo_evento->delete();
        return request()->json(200, $tipo_evento);
    }
}
