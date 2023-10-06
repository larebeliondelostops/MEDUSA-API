<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use App\Clases\SaveGeoJson;
use App\Http\Request\Alarms\AlarmsRequest;
use App\Models\Alarms;
use App\Strategies\Interface\Villavicencio\AlarmsInterface;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use \Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class StrategyAlarms implements AlarmsInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $alarms = Alarms::all();
            $transformedData = [];
            foreach ($alarms as $alarms) {
                $coordinates = json_decode($alarms->pointCoordinates, true);
                $geometry = $coordinates['features'][0]['geometry'];

                $transformedData[] = [
                    'markerType' => 1,
                    'id' => $alarms->uuid,
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
            $alarm = Alarms::where('uuid', $uuid)->first();

            $alarm = [
                'title' => $alarm->name,
                'properties' => [
                    'Direccion' => $alarm->address,
                ]
            ];

            return Response::json($alarm, 200, [], JSON_PRETTY_PRINT);
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
    }

    public function allTable(Request $request)
    {
        try {
            // Obtener fechas de inicio y fin
            $start = $request->start;
            $end = $request->end;
            //dd($fechaInicial);
            // Aplicar la restricción whereBetween en la consulta
            if ($start && $end) {
                $alarms = Alarms::whereBetween('created_at', [$start, $end])
                    ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            } else {
                $alarms = Alarms::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }

            $transformedData = [];
            foreach ($alarms as $alarm) {
                $transformedData[] = [
                    'ID' => $alarm->id,
                    'Nombre' => $alarm->name,
                    'Direccion' => $alarm->address,
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
    }


    /**
     * Metodo para guardar un nuevo centro de Entidades.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlarmsRequest $request)
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
    }

    public function storeMax(Request $request)
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
    }
}
