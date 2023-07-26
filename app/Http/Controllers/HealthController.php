<?php

namespace App\Http\Controllers;

use App\Http\Request\Health\HealthRequest;
use Exception;
use App\Models\Health;
use App\Values\HealthValues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;



/**
 * Controlador Maneja Lógica de Salud.
 *
 * Controlador que maneja la lógica de centros de salud y las modificaciones posibles con el sistema.
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     David Acosta Ojeda <Dacostaojeda2000@gmail.com>
 * @version    v1.0.0
 */
class HealthController extends Controller
{
    public function all()
    {

        try {

            $state = request()->input('state');

            $strategy = HealthValues::STRATEGY[$state];

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

    public function store(HealthRequest $request)
    {

        try {

            $state = request()->input('state');

            $strategy = HealthValues::STRATEGY[$state];

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

            $strategy = HealthValues::STRATEGY[$state];

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

            $strategy = HealthValues::STRATEGY[$state];

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

            $strategy = HealthValues::STRATEGY[$state];

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
