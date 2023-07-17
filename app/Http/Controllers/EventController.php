<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Values\EventCreateValues;
use App\Values\EventGetValues;
use App\Values\ReportsValues;

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


    //Generacion de reportes

    public function EventsForMonth(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->EventsForMonth();
    }

    public function EventsForType(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->EventsForType();
    }

    public function EventsByAuthorizingEntity(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->EventsByAuthorizingEntity();
    }

    public function EventsByCapacityRange(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->EventsByCapacityRange();
    }

    public function EventsPastAndFuture(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->EventsPastAndFuture();
    }

    public function EventsByTypeAndAuthorizingEntity(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->EventsByTypeAndAuthorizingEntity();
    }
}
