<?php

namespace App\Strategies\StrategyPollingPlace;

use App\Http\Request\pollingPlace\pollingPlaceRequest;
use App\Models\PollingPlace;
use App\Strategies\PollingPlaceInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use \Illuminate\Http\Request;


class StrategyPollingPlace implements PollingPlaceInterface
{
     /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        try {
            $pollingPlace = PollingPlace::all();
    
            $transformedData = [];
            foreach ($pollingPlace as $pollingPlace) {
                $coordinates = json_decode($pollingPlace->pointCoordinates, true);
                $geometry = $coordinates['features'][0]['geometry'];
    
                $transformedData[] = [
                    'type' => 'feature',
                    'markerType' => 7,
                    'id' => $pollingPlace->id,
                    'title' => $pollingPlace->name,
                    'geometry' => $geometry,
                    'properties' => [
                        'Direccion' => $pollingPlace->address,
                        'Potencial de mujeres' => $pollingPlace->potencialWomen,
                        'Potencial de hombres' => $pollingPlace->potencialMen,
                        'Total Votos' => $pollingPlace->totalVotes,
                        'Mesas' => $pollingPlace->tables,
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
            $pollingPlace->name = $request->name;
            $pollingPlace->address = $request->address;
            $pollingPlace->pointCoordinates = json_encode($request->pointCoordinates);
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

            $pollingPlace = PollingPlace::find($id);
            if ($request->name != null){
                $pollingPlace->name = $request->name;
            }
            if ($request->address != null){
                $pollingPlace->address = $request->address;
            }
            if ($request->pointCoordinates != null){
                $pollingPlace->pointCoordinates = json_encode($request->pointCoordinates);
            }
            if ($request->potencialWomen != null){
                $pollingPlace->potencialWomen = $request->potencialWomen;
            }
            if ($request->potencialMen != null){
                $pollingPlace->potencialMen = $request->potencialMen;
            }
            if ($request->totalVotes != null){
                $pollingPlace->totalVotes = $request->totalVotes;
            }
            if ($request->tables != null){
                $pollingPlace->tables = $request->tables;
            }
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

}
