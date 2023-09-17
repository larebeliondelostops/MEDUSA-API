<?php

namespace App\Strategies\StrategiesPoints;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Models\Ambient;
use App\Clases\SaveGeoJson;
use \Illuminate\Http\Request;
use App\Strategies\PointsInterface;
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
                    'type' => 'feature',
                    'markerType' => 4,
                    'id' => $ambient->uuid,
                    'title' => $ambient->name,
                    'geometry' => $geometry,
                    'properties' => [
                        'Direccion' => $ambient->address
                    ]
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

    /* public function getOne($id)
    {
        try {
            $alarms = Alarms::find($id);

            $cordenadas = json_decode($alarms->pointCoordinates)->features[0]->geometry;

            return Response::json([
                'status' => 'succes',
                'data' => [
                    'name' => $alarms->name,
                    'address' => $alarms->address,
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
    } */

    /* public function allTable(Request $request)
    {
        try {
            $alarms = Alarms::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);

            $transformedData = [];
            foreach ($alarms as $alarm) {
                $transformedData[] = [
                    'id' => $alarm->id,
                    'nombre' => $alarm->name,
                    'direccion' => $alarm->address,
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'pagination' => [
                        'total' => $alarms->total(),
                        'perPage' => $alarms->perPage(),
                        'currentPage' => $alarms->currentPage(),
                        'lastPage' => $alarms->lastPage(),
                        'from' => $alarms->firstItem(),
                        'to' => $alarms->lastItem(),
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
    } */


    /**
     * Metodo para guardar un nuevo centro de Entidades.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(AlarmsRequest $request)
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
            $alarms = new Alarms();
            $alarms->uuid = Uuid::uuid4()->toString();
            $alarms->name = $request->name;
            $alarms->address = $request->address;
            $alarms->pointCoordinates = SaveGeoJson::saveLikePoint($request->position);
            $alarms->save();

            return Response::json([
                'status' => 'succes',
                'data' => [
                    'name' => $alarms->name,
                    'address' => $alarms->address,
                    'position' => json_decode($alarms->pointCoordinates)
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
    } */

    /**
     * Metodo para actualizar un centro de Entidades especifico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, $id)
    {
        try {

            $alarms = Alarms::find($id);

            $request->name != null ? $alarms->name = $request->name : $alarms->name = $alarms->name;
            $request->address != null ? $alarms->address = $request->address : $alarms->address = $alarms->address;
            $request->position != null ? $alarms->pointCoordinates = SaveGeoJson::saveLikePoint($request->position) : $alarms->pointCoordinates = $alarms->pointCoordinates;
            $alarms->save();

            return Response::json([
                'status' => 'succes',
                'data' => $alarms
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    } */

    /**
     * Metodo para eliminar un centro de Entidades especifico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /* public function destroy($id)
    {
        try {

            return Alarms::destroy($id);

            return Response::json([
                'status' => 'succes',
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    } */

    /* public function storeMax(Request $request)
    {
        try {
            // Validación
            if (isset($request->validator) && $request->validator->fails()) {
                return response()->json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            // Recorrer el array de JSON y guardar cada elemento en la base de datos
            foreach ($request->array as $alarmData) {
                $alarms = new Alarms();
                $alarms->name = $alarmData['name'];
                $alarms->address = $alarmData['address'];
                $alarms->pointCoordinates = json_encode($alarmData['pointCoordinates']);
                $alarms->save();
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Datos almacenados exitosamente'
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return response()->json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    } */
}
