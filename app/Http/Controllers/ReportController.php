<?php

namespace App\Http\Controllers;

use App\Interfaces\Reports\ReportInterface;
use App\Support\TenantLanguage;
use App\Values\ReportsValues;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

/**
 * Controlador manejan todo lo que tiene que ver con reportes
 *
 * Controlador que maneja el llamado a las strategias de reportes
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class ReportController extends Controller
{
    /**
     * ReportInterface constructor.
     */
    public function __construct(
        private ReportInterface $service
    ) {
    }

    public function index(Request $request, string $method, $slug)
    {
        try {
            return $this->service->getReportsData($request, $method, $slug);
        } catch (ModelNotFoundException $exception) {
            return Response::json([
                'status' => 'error',
                'message' => TenantLanguage::text('No existe la subcategoria solicitada', 'The requested subcategory does not exist'),
            ], 404, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request'),
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

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
