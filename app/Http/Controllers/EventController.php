<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Values\EventCreateValues;
use App\Values\EventGetValues;

class EventController extends Controller
{

    public function getAllEvents()
    {
        $state = request()->input('state');

        $strategy = EventGetValues::STRATEGY[$state];

        return (new $strategy)->getAllEvents();
    }

    public function getEventsType(Request $request)
    {
        $state = request()->input('state');

        $strategy = EventGetValues::STRATEGY[$state];

        return (new $strategy)->getEventsType($request);
    }

    public function getEventsForDate(Request $request)
    {
        $state = request()->input('state');

        $strategy = EventGetValues::STRATEGY[$state];

        return (new $strategy)->getEventsForDate($request);
    }

    public function createEvent(Request $request)
    {
        $state = $request->input('state');

        $strategy = EventCreateValues::STRATEGY[$state];

        return (new $strategy)->createEvent($request);
    }

}
