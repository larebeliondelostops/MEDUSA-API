<?php

namespace App\Strategies\StrategiesPoints\Neiva;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Models\Ambient;
use App\Clases\SaveGeoJson;
use App\Http\Requests\Neiva\AmbientRequest;
use \Illuminate\Http\Request;
use App\Strategies\Interface\PointsInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

/**
 * Strategy Ambient.
 *
 * Estrategia que maneja la lógica del modelo ambiental en neiva
 *
 * @package    Stragegies
 * @subpackage \StrategiesPoints
 * @copyright  2023 Ignicion Games S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0
 */
class StrategyAmbient implements PointsInterface
{
    /**
     * Metodo para obtener todos los puntos de Ambiental
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $ambients = Ambient::all();

            $transformedData = [];

            foreach ($ambients as $ambient) {
                $coordinates = json_decode($ambient->position, true);
                $geometry = $coordinates['features'][0]['geometry'];

                $transformedData[] = [
                    'markerType' => 4,
                    'id' => $ambient->uuid,
                    'geometry' => $geometry,
                ];
            }

            return Response::json($transformedData, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public static function getInfoPoint($uuid)
    {
        try {
            $ambient = Ambient::where('uuid', $uuid)->first();

            $ambient = [
                'title' => $ambient->name,
                'properties' => [
                    'Direccion' => $ambient->address,
                ]
            ];

            return Response::json($ambient, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function getOne($id)
    {
        try {
            $ambient = Ambient::find($id);

            $cordenadas = json_decode($ambient->position)->features[0]->geometry;

            return Response::json([
                'status' => 'succes',
                'data' => [
                    'name' => $ambient->name,
                    'position' => [
                        'type' => "Point",
                        'coordinates' => [$cordenadas->coordinates]
                    ]
                ]
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function allTable(Request $request)
    {
        try {
            // Obtener fechas de inicio y fin
            $start = $request->start;
            $end = $request->end;
            // Aplicar la restricción whereBetween en la consulta   
            if ($start && $end) {
                $ambient = Ambient::whereBetween('created_at', [$start, $end])
                ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }else{
                $ambient = Ambient::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }

            $transformedData = [];
            foreach ($ambient as $alarm) {
                $transformedData[] = [
                    'id' => $alarm->id,
                    'nombre' => $alarm->name,
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'pagination' => [
                        'total' => $ambient->total(),
                        'perPage' => $ambient->perPage(),
                        'currentPage' => $ambient->currentPage(),
                        'lastPage' => $ambient->lastPage(),
                        'from' => $ambient->firstItem(),
                        'to' => $ambient->lastItem(),
                    ],
                ],
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }


    /**
     * Metodo para guardar un nuevo centro de Entidades.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validación
            if (isset($request->validator) && $request->validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            //$entidades = Entidades::create($request->all());
            $alarms = new Ambient();
            $alarms->uuid = Uuid::uuid4()->toString();
            $alarms->name = $request->name;
            $alarms->position = SaveGeoJson::saveLikePoint($request->position);
            $alarms->save();

            return Response::json([
                'status' => 'succes',
                'data' => [
                    'name' => $alarms->name,
                    'position' => json_decode($alarms->position)
                ]
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Metodo para actualizar un centro de Entidades especifico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $ambient = Ambient::find($id);

            $request->name != null ? $ambient->name = $request->name : $ambient->name = $ambient->name;
            $request->position != null ? $ambient->position = SaveGeoJson::saveLikePoint($request->position) : $ambient->position = $ambient->position;
            $ambient->save();

            return Response::json([
                'status' => 'succes',
                'data' => $ambient
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    /**
     * Metodo para eliminar un centro de Entidades especifico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            Ambient::destroy($id);

            return Response::json([
                'status' => 'succes',
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }
}
