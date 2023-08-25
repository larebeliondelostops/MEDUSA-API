<?php

namespace App\Http\Controllers;

use App\Http\Request\Alarms\AlarmsRequest;
use App\Values\AlarmsValues;
use App\Models\Alarms;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


/**
 * Controlador manejan todo lo que tiene que ver con Entidades
 *
 * Controlador que maneja el llamado a las strategias ya sea para crear, actualizar, eliminar o consultar entidades
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     David Acosta <Dacostaojeda2000@gmail.com>
 * @version    v1.0.0
 */

class AlarmsController extends Controller
{

    //Metodo para traer todas las entidades
    public function all()
    {

        try {

            $state = request()->input('state');

            $strategy = AlarmsValues::STRATEGY[$state];

            return (new $strategy)->all();
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    //Metodo para traer todas las entidades
    public function allTable(Request $request)
    {

        try {

            $state = request()->input('state');

            $strategy = AlarmsValues::STRATEGY[$state];

            return (new $strategy)->allTable($request);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function getOne($id)
    {

        try {

            $state = request()->input('state');

            $strategy = AlarmsValues::STRATEGY[$state];

            return (new $strategy)->getOne($id);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }


    public function store(AlarmsRequest $request)
    {

        try {

            $state = request()->input('state');

            $strategy = AlarmsValues::STRATEGY[$state];

            return (new $strategy)->store($request);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function update(Request $request, $id)
    {

        try {

            $state = request()->input('state');

            $strategy = AlarmsValues::STRATEGY[$state];

            return (new $strategy)->update($request, $id);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function destroy($id)
    {

        try {

            $state = request()->input('state');

            $strategy = AlarmsValues::STRATEGY[$state];

            return (new $strategy)->destroy($id);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function storeMax(Request $request)
    {

        try {

            $state = request()->input('state');

            $strategy = AlarmsValues::STRATEGY[$state];

            return (new $strategy)->storeMax($request);
        } catch (Exception $exception) {

            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());

            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generacion De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
