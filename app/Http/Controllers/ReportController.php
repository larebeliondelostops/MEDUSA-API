<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Values\ReportsValues;


/**
 * Controlador manejan todo lo que tiene que ver con reportes
 *
 * Controlador que maneja el llamado a las strategias de reportes
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     David Acosta <dacostaojeda2000@gmail.com>
 * @version    v1.0.0
 */

class ReportController extends Controller
{
    //Generacion de reportes de eventos

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

    //reportes de criminalidad

    public function MostOccurrencesDateOfTheMonth(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->MostOccurrencesDateOfTheMonth();
    }

    public function HourMostOccurrencesOfTheMonth(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->HourMostOccurrencesOfTheMonth();
    }

    public function DayWeekMostOccurrencesOfMonth(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->DayWeekMostOccurrencesOfMonth();
    }

    public function MostFrequentCrime(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->MostFrequentCrime();
    }

    public function CrimeLessFrequent(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->CrimeLessFrequent();
    }

    public function MostFrequentCrimeByZone(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->MostFrequentCrimeByZone();
    }


}
