<?php

namespace App\Strategies\StrategyCameras;

use App\Http\Request\Cameras\CamerasRequest;
use App\Models\Cameras;
use App\Strategies\CamerasInterface;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use \Illuminate\Http\Request;


class StrategyCameras implements CamerasInterface
{
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        try {
            $cameras = Cameras::all();
    
            $transformedData = [];
            foreach ($cameras as $cameras) {
                $coordinates = json_decode($cameras->pointCoordinates, true);
                $geometry = $coordinates['features'][0]['geometry'];
    
                $transformedData[] = [
                    'type' => 'feature',
                    'markerType' => 7,
                    'id' => $cameras->id,
                    'title' => $cameras->name,
                    'url' => $cameras->url,
                    'geometry' => $geometry,
                    'properties' => [
                        'Direccion' => $cameras->address
                    ]
                ];
            }
    
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
    public function update(Request $request,$id)
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
            if ($request->name != null){
                $cameras->name = $request->name;
            }
            if ($request->address != null){
                $cameras->address = $request->address;
            }
            if ($request->url != null){
                $cameras->url = $request->url;
            }
            if ($request->pointCoordinates != null){
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
