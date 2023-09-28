<?php

namespace App\Strategies\StrategyCai;

use App\Http\Request\cai\CaiRequest;
use App\Models\Cai;
use App\Strategies\CaiInterface;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use \Illuminate\Http\Request;


class StrategyCai implements CaiInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        try {
            $cai = Cai::all();

            $transformedData = [];
            foreach ($cai as $cai) {
                $coordinates = json_decode($cai->pointCoordinates, true);
                $geometry = $coordinates['features'][0]['geometry'];

                $transformedData[] = [
                    'markerType' => 2,
                    'id' => $cai->uuid,
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
            $cai = Cai::where('uuid', $uuid)->first();

            $cai = [
                'title' => $cai->name,
                'properties' => [
                    'Direccion' => $cai->address,
                ]
            ];

            return Response::json($cai, 200, [], JSON_PRETTY_PRINT);
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
            $cai = Cai::find($id);

            $transformedData = [];

            $transformedData[] = [
                'id' => $cai->id,
                'uuid' => $cai->uuid,
                'name' => $cai->name,
                'address' => $cai->address,
                'created_at' => $cai->created_at,
                'updated_at' => $cai->updated_at,
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
                $cais = Cai::whereBetween('created_at', [$start, $end])
                    ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            } else {
                $cais = Cai::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }

            $transformedData = [];
            foreach ($cais as $cai) {
                $transformedData[] = [
                    'ID' => $cai->id,
                    //'uuid' => $cai->uuid,
                    'Nombre' => $cai->name,
                    'Direccion' => $cai->address,
                    //'created_at' => $cai->created_at,
                    //'updated_at' => $cai->updated_at,
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'pagination' => [
                        'total' => $cais->total(),
                        'perPage' => $cais->perPage(),
                        'currentPage' => $cais->currentPage(),
                        'lastPage' => $cais->lastPage(),
                        'from' => $cais->firstItem(),
                        'to' => $cais->lastItem(),
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
    public function store(CaiRequest $request)
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
            $cai = new Cai();
            $cai->name = $request->name;
            $cai->address = $request->address;
            $cai->pointCoordinates = json_encode($request->pointCoordinates);
            $cai->save();

            return Response::json([
                'status' => 'succes',
                'data' => $cai
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

            $cai = Cai::find($id);
            if ($request->name != null) {
                $cai->name = $request->name;
            }
            if ($request->address != null) {
                $cai->address = $request->address;
            }
            if ($request->pointCoordinates != null) {
                $cai->pointCoordinates = json_encode($request->pointCoordinates);
            }
            $cai->save();

            return Response::json([
                'status' => 'succes',
                'data' => $cai
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

            return Cai::destroy($id);

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
                $cai = new Cai();
                $cai->name = $Data['name'];
                $cai->address = $Data['address'];
                $cai->pointCoordinates = json_encode($Data['pointCoordinates']);
                $cai->save();
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
