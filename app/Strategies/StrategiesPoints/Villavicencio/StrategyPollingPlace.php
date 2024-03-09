<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Clases\SaveGeoJson;
use App\Models\PollingPlace;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Interfaces\Markers\PointsInterface;
use App\Http\Request\pollingPlace\pollingPlaceRequest;

class StrategyPollingPlace implements PointsInterface
{
    public function __construct(
        private PollingPlace $model
    ) {}

    public function getModel() : PollingPlace
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->model->allPoints();
    }

    public function getInfoPoint($id)
    {
        $pollingPlace = $this->model->where('uuid', $id)->first();

        $pollingPlace = [
            'title' => $pollingPlace->name,
            'properties' => [
                'Direccion' => $pollingPlace->address,
                'Potencial de mujeres' => $pollingPlace->potencialWomen,
                'Potencial de hombres' => $pollingPlace->potencialMen,
                'Total Votos' => $pollingPlace->totalVotes,
                'Mesas' => $pollingPlace->tables,
            ]
        ];

        return $pollingPlace;
    }

    public function getOne($id)
    {
        try {
            $pollingPlace = PollingPlace::find($id);

            $cordenadas = json_decode($pollingPlace->pointCoordinates)->features[0]->geometry;

            return Response::json([
                'status' => 'succes',
                'data' => [
                    'name' => $pollingPlace->name,
                    'address' => $pollingPlace->address,
                    'potencialWomen' => $pollingPlace->potencialWomen,
                    'potencialMen' => $pollingPlace->potencialMen,
                    'totalVotes' => $pollingPlace->totalVotes,
                    'tables' => $pollingPlace->tables,
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

            if ($start && $end) {
                $pollingPlaces = PollingPlace::whereBetween('created_at', [$start, $end])
                    ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            } else {
                $pollingPlaces = PollingPlace::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }

            $transformedData = [];
            foreach ($pollingPlaces as $pollingPlace) {
                $transformedData[] = [
                    'ID' => $pollingPlace->id,
                    //'uuid' => $pollingPlace->uuid,
                    'Nombre' => $pollingPlace->name,
                    'Direccion' => $pollingPlace->address,
                    //'created_at' => $pollingPlace->created_at,
                    //'updated_at' => $pollingPlace->updated_at,
                    //'Potencial de mujeres' => $pollingPlace->potencialWomen,
                    //'Potencial de hombres' => $pollingPlace->potencialMen,
                    //'Total Votos' => $pollingPlace->totalVotes,
                    //'Mesas' => $pollingPlace->tables,
                ];
            }

            return response()->json([
                
                'data' => $transformedData,
                'meta' => [
                    'title' => 'Puestos de votación',
                    'pagination' => [
                        'total' => $pollingPlaces->total(),
                        'perPage' => $pollingPlaces->perPage(),
                        'currentPage' => $pollingPlaces->currentPage(),
                        'lastPage' => $pollingPlaces->lastPage(),
                        'from' => $pollingPlaces->firstItem(),
                        'to' => $pollingPlaces->lastItem(),
                    ],
                    'ableCreate' => true
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
    public function store(PollingPlaceRequest $request)
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
            $pollingPlace = new PollingPlace();
            $pollingPlace->uuid = Uuid::uuid4()->toString();
            $pollingPlace->name = $request->name;
            $pollingPlace->address = $request->address;
            $pollingPlace->pointCoordinates = SaveGeoJson::saveLikePoint($request->position);
            $pollingPlace->potencialWomen = $request->potencialWomen;
            $pollingPlace->potencialMen = $request->potencialMen;
            $pollingPlace->totalVotes = $request->totalVotes;
            $pollingPlace->tables = $request->tables;
            $pollingPlace->save();

            return Response::json([
                'status' => 'succes',
                'data' => $pollingPlace
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


            $pollingPlace = PollingPlace::find($id);

            $request->name != null ? $pollingPlace->name = $request->name : $pollingPlace->name = $pollingPlace->name;
            $request->address != null ? $pollingPlace->address = $request->address : $pollingPlace->address = $pollingPlace->address;
            $request->position != null ? $pollingPlace->pointCoordinates = SaveGeoJson::saveLikePoint($request->position) : $pollingPlace->pointCoordinates = $pollingPlace->pointCoordinates;
            $request->potencialWomen != null ? $pollingPlace->potencialWomen = $request->potencialWomen : $pollingPlace->potencialWomen = $pollingPlace->potencialWomen;
            $request->potencialMen != null ? $pollingPlace->potencialMen = $request->potencialMen : $pollingPlace->potencialMen = $pollingPlace->potencialMen;
            $request->totalVotes != null ? $pollingPlace->totalVotes = $request->totalVotes : $pollingPlace->totalVotes = $pollingPlace->totalVotes;
            $request->tables != null ? $pollingPlace->tables = $request->tables : $pollingPlace->tables = $pollingPlace->tables;

            $pollingPlace->save();

            return Response::json([
                'status' => 'succes',
                'data' => $pollingPlace
            ], 204, [], JSON_PRETTY_PRINT);
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

            return PollingPlace::destroy($id);

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
            foreach ($request->array as $Data) {
                $pollingPlace = new PollingPlace();
                $pollingPlace->name = $Data['name'];
                $pollingPlace->address = $Data['address'];
                $pollingPlace->potencialWomen = $Data['potencialWomen'];
                $pollingPlace->potencialMen = $Data['potencialMen'];
                $pollingPlace->totalVotes = $Data['totalVotes'];
                $pollingPlace->tables = $Data['tables'];
                $pollingPlace->pointCoordinates = json_encode($Data['pointCoordinates']);
                $pollingPlace->save();
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
