<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Slug;
use Illuminate\Http\Request;
use App\Values\ReportsValues;
use App\Contexts\ReportsContext;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

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

class ReportsController extends Controller
{
        /**
     * Variable para almacenar el contexto de la data
     */
    private $value;
    private $all_data;
    private $slugs;

    /**
     * AllDataController constructor.
     */
    public function __construct()
    {
    }

    public function getSubDomain()
    {
        $this->value = ReportsContext::VALUE[tenant('id')];
    }

    public function index(Request $request, string $method, $slug)
    {
        try {

            $this->getSubDomain();

            $this->slugs = Slug::where('name', $slug)->first();
            Log::info($slug);
            Log::info($this->slugs->id);
            $strategy_report = $this->value::STRATEGY[$this->slugs->id];

            $strategy_report_instace = new $strategy_report();

            $data = $strategy_report_instace->{$method}($request);

            return $data;
            //return Response::json($all_data, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    //Generacion de reportes de eventos
    public function getReportsData(Request $request)
    {
        $state = $request->input('state');

        $strategy = ReportsValues::STRATEGY[$state];

        return (new $strategy)->getReportsData();
    }

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

    public function StatisticsByIndicatorAndGrid(Request $request)
    {
        $state = $request->input('state');
        $strategy = ReportsValues::STRATEGY[$state];
        return (new $strategy)->StatisticsByIndicatorAndGrid($request);
    }

    public function StatisticsGeneral(Request $request)
    {
        $state = $request->input('state');
        $strategy = ReportsValues::STRATEGY[$state];
        return (new $strategy)->StatisticsGeneral($request);
    }
}
