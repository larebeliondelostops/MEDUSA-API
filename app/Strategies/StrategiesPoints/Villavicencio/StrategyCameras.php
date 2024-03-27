<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use App\Models\Villavicencio\Cameras;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Http\Request\Cameras\CamerasRequest;
use App\Interfaces\Markers\PointsInterface;

class StrategyCameras implements PointsInterface
{
    public function __construct(
        private Cameras $model
    ) {}

    public function getModel() : Cameras
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->model->allPoints();
    }

    public function getInfoPoint($id)
    {
        $camera = $this->model->where('uuid', $id)->first();

        $camera = [
            'title' => $camera->name,
            'properties' => [
                'Direccion' => $camera->address
            ]
        ];

        return $camera;
    }

    public function getOne($id)
    {
        try {
            $cameras = Cameras::find($id);

            $transformedData = [];

            $transformedData[] = [
                'ID' => $cameras->id,
                'uuid' => $cameras->uuid,
                'name' => $cameras->name,
                'address' => $cameras->address,
                'created_at' => $cameras->created_at,
                'updated_at' => $cameras->updated_at,
            ];


            return Response::json($transformedData, 201, [], JSON_PRETTY_PRINT);
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
                $cameras = Cameras::whereBetween('created_at', [$start, $end])
                    ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            } else {
                $cameras = Cameras::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }

            $transformedData = [];
            foreach ($cameras as $camera) {
                $transformedData[] = [
                    'ID' => $camera->id,
                    //'uuid' => $camera->uuid,
                    'Nombre' => $camera->name,
                    'Direccion' => $camera->address,
                    //'created_at' => $camera->created_at,
                    //'updated_at' => $camera->updated_at,
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'pagination' => [
                        'total' => $cameras->total(),
                        'perPage' => $cameras->perPage(),
                        'currentPage' => $cameras->currentPage(),
                        'lastPage' => $cameras->lastPage(),
                        'from' => $cameras->firstItem(),
                        'to' => $cameras->lastItem(),
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
    public function store(CamerasRequest $request)
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
            $cameras = new Cameras();
            $cameras->name = $request->name;
            $cameras->address = $request->address;
            $cameras->url = $request->url;
            $cameras->pointCoordinates = json_encode($request->pointCoordinates);
            $cameras->save();

            return Response::json([
                'status' => 'succes',
                'data' => $cameras
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

            // Validación
            // if (isset($request->validator) && $request->validator->fails()) {
            //     return Response::json([
            //         'code' => '2001',
            //         'status' => 'error',
            //         'message' => 'Datos Recibidos Incorrectos',
            //         'errors' => $request->validator->messages()
            //     ], 400, [], JSON_PRETTY_PRINT);
            // }

            $cameras = Cameras::find($id);
            if ($request->name != null) {
                $cameras->name = $request->name;
            }
            if ($request->address != null) {
                $cameras->address = $request->address;
            }
            if ($request->url != null) {
                $cameras->url = $request->url;
            }
            if ($request->pointCoordinates != null) {
                $cameras->pointCoordinates = json_encode($request->pointCoordinates);
            }
            $cameras->save();

            return Response::json([
                'status' => 'succes',
                'data' => $cameras
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

            return Cameras::destroy($id);

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
                $cameras = new Cameras();
                $cameras->name = $Data['name'];
                $cameras->address = $Data['address'];
                $cameras->url = $Data['url'];
                $cameras->pointCoordinates = json_encode($Data['pointCoordinates']);
                $cameras->save();
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
