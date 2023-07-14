<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Values\CreateEventoValues;
use App\Values\GetEventoValues;

class EventoController extends Controller
{

    public function getAllEvents()
    {
        $state = request()->input('state');

        $strategy = GetEventoValues::STRATEGY[$state];

        return (new $strategy)->getAllEvents();
    }

    public function getTipoEvents(Request $request)
    {
        $state = request()->input('state');

        $strategy = GetEventoValues::STRATEGY[$state];

        return (new $strategy)->getTipoEvents($request);
    }

    public function getEventsForDate(Request $request)
    {
        $state = request()->input('state');

        $strategy = GetEventoValues::STRATEGY[$state];

        return (new $strategy)->getEventsForDate($request);
    }

    public function createEvent(Request $request)
    {
        $state = $request->input('state');

        $strategy = CreateEventoValues::STRATEGY[$state];

        return (new $strategy)->createEvent($request);
    }

}
