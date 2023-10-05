<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use App\Http\Request\Health\HealthRequest;
use App\Models\Health;
use App\Strategies\Interface\Villavicencio\HealthInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use \Illuminate\Http\Request;


class StrategyHealth implements HealthInterface
{
     /**
     * Metodo para obtener todos los centros de salud
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        try {

            $health = Health::with('entities')->get();
            return Response::json([
                'status' => 'succes',
                'data' => $health,
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
     * Metodo para guardar un nuevo centro de salud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthRequest $request)
    {

            // Validación
            if (isset($request->validator) && $request->validator->fails()) {
                return Response::json([
                    'code' => '2001',
                    'status' => 'error',
                    'message' => 'Datos Recibidos Incorrectos',
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }
            //$health = Health::create($request->all());
            $health = new Health();
            $health->idEntities = $request->idEntities;
            $health->emergencyPatients = $request->emergencyPatients;
            $health->emergencyBedsAvailable = $request->emergencyBedsAvailable;
            $health->availableOperatingRooms = $request->availableOperatingRooms;
            $health->intensiveCareUnitAvailable = $request->intensiveCareUnitAvailable;
            $health->firstLevelBeds = $request->firstLevelBeds;
            $health->secondLevelBeds = $request->secondLevelBeds;
            $health->thirdLevelBeds = $request->thirdLevelBeds;
            $health->bloodBank = $request->bloodBank;
            $health->doctorsInTheShift = $request->doctorsInTheShift;
            $health->nursesInTheShift = $request->nursesInTheShift;
            $health->affiliatedIps = $request->affiliatedIps;
            $health->numberOfEmergenciesDay= $request->numberOfEmergenciesDay;
            $health->save();

            return Response::json([
                'status' => 'succes',
                'data' => $health
            ], 201, [], JSON_PRETTY_PRINT);

    }
    /**
     * Metodo para actualizar un centro de salud especifico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

            //Borrando de la base de datos la habitación seleccionada desde la vista de inicio

            $health = Health::find($id);

            if ($request->emergencyPatients != null) {
                $health->emergencyPatients = $request->emergencyPatients;
            }
            
            if ($request->emergencyBedsAvailable != null) {
                $health->emergencyBedsAvailable = $request->emergencyBedsAvailable;
            }
            
            if ($request->availableOperatingRooms != null) {
                $health->availableOperatingRooms = $request->availableOperatingRooms;
            }
            
            if ($request->intensiveCareUnitAvailable != null) {
                $health->intensiveCareUnitAvailable = $request->intensiveCareUnitAvailable;
            }
            
            if ($request->firstLevelBeds != null) {
                $health->firstLevelBeds = $request->firstLevelBeds;
            }
            
            if ($request->secondLevelBeds != null) {
                $health->secondLevelBeds = $request->secondLevelBeds;
            }
            
            if ($request->thirdLevelBeds != null) {
                $health->thirdLevelBeds = $request->thirdLevelBeds;
            }
            
            if ($request->bloodBank != null) {
                $health->bloodBank = $request->bloodBank;
            }
            
            if ($request->doctorsInTheShift != null) {
                $health->doctorsInTheShift = $request->doctorsInTheShift;
            }
            
            if ($request->nursesInTheShift != null) {
                $health->nursesInTheShift = $request->nursesInTheShift;
            }
            
            if ($request->affiliatedIps != null) {
                $health->affiliatedIps = $request->affiliatedIps;
            }
            
            if ($request->numberOfEmergenciesDay != null) {
                $health->numberOfEmergenciesDay = $request->numberOfEmergenciesDay;
            }

            $health->save();

            return Response::json([
                'status' => 'succes',
                'data' => $health
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
     * Metodo para eliminar un centro de salud especifico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            return Health::destroy($id);

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
                $health = new Health();
                $health->idEntities = $Data['idEntities'];
                $health->emergencyPatients = $Data['emergencyPatients'];
                $health->emergencyBedsAvailable = $Data['emergencyBedsAvailable'];
                $health->availableOperatingRooms = $Data['availableOperatingRooms'];
                $health->intensiveCareUnitAvailable = $Data['intensiveCareUnitAvailable'];
                $health->firstLevelBeds = $Data['firstLevelBeds'];
                $health->secondLevelBeds = $Data['secondLevelBeds'];
                $health->thirdLevelBeds = $Data['thirdLevelBeds'];
                $health->bloodBank = $Data['bloodBank'];
                $health->doctorsInTheShift = $Data['doctorsInTheShift'];
                $health->nursesInTheShift = $Data['nursesInTheShift'];
                $health->affiliatedIps = $Data['affiliatedIps'];
                $health->numberOfEmergenciesDay= $Data['numberOfEmergenciesDay'];
                $health->save();
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
