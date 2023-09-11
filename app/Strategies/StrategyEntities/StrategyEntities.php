<?php

namespace App\Strategies\StrategyEntities;

use App\Http\Request\Entities\EntitiesRequest;
use App\Models\Entities;
use App\Models\Health;
use App\Strategies\EntitiesInterface;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use \Illuminate\Http\Request;


class StrategyEntities implements EntitiesInterface
{
    /**
     * Metodo para obtener todos los centros de Entidades
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        try {
            $entities = Entities::all();

            $transformedData = [];
            foreach ($entities as $entity) {
                $coordinates = json_decode($entity->pointCoordinates, true);
                $geometry = $coordinates['features'][0]['geometry'];

                // Fetch health data for the current entity
                $healthData = Health::where('idEntities', $entity->id)->first();

                $properties = [
                    'Direccion' => $entity->address,
                    'Pacientes en Emergencia' => $healthData->emergencyPatients ?? null,
                    'Camas de Emergencia Disponibles' => $healthData->emergencyBedsAvailable ?? null,
                    'Quirófanos Disponibles' => $healthData->availableOperatingRooms ?? null,
                    'Unidad de Cuidados Intensivos Disponible' => $healthData->intensiveCareUnitAvailable ?? null,
                    'Camas de Primer Nive' => $healthData->firstLevelBeds ?? null,
                    'Camas de Segundo Nivel' => $healthData->secondLevelBeds ?? null,
                    'Camas de Tercer Nivel' => $healthData->thirdLevelBeds ?? null,
                    'Banco de Sangre' => $healthData->bloodBank ?? null,
                    'Médicos en Turno' => $healthData->doctorsInTheShift ?? null,
                    'Enfermeras en Turno' => $healthData->nursesInTheShift ?? null,
                    'IPS Afiliada' => $healthData->affiliatedIps ?? null,
                    'Número de Emergencias al Día' => $healthData->numberOfEmergenciesDay ?? null
                ];

                $transformedData[] = [
                    'type' => 'feature',
                    'markerType' => 3,
                    'id' => $entity->uuid,
                    'title' => $entity->name,
                    'geometry' => $geometry,
                    'properties' => $properties
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

    public function getOne($id)
    {
        try {
            $entities = Entities::find($id);

            $transformedData = [];


            // Fetch health data for the current entity
            $healthData = Health::where('idEntities', $entities->id)->first();

            $transformedData[] = [
                'id' => $entities->id,
                'idHealth' => $healthData->id,
                'uuid' => $entities->uuid,
                'name' => $entities->name,
                'address' => $entities->address,
                'created_at' => $entities->created_at,
                'updated_at' => $entities->updated_at,
                'Pacientes en Emergencia' => $healthData->emergencyPatients ?? null,
                'Camas de Emergencia Disponibles' => $healthData->emergencyBedsAvailable ?? null,
                'Quirófanos Disponibles' => $healthData->availableOperatingRooms ?? null,
                'Unidad de Cuidados Intensivos Disponible' => $healthData->intensiveCareUnitAvailable ?? null,
                'Camas de Primer Nive' => $healthData->firstLevelBeds ?? null,
                'Camas de Segundo Nivel' => $healthData->secondLevelBeds ?? null,
                'Camas de Tercer Nivel' => $healthData->thirdLevelBeds ?? null,
                'Banco de Sangre' => $healthData->bloodBank ?? null,
                'Médicos en Turno' => $healthData->doctorsInTheShift ?? null,
                'Enfermeras en Turno' => $healthData->nursesInTheShift ?? null,
                'IPS Afiliada' => $healthData->affiliatedIps ?? null,
                'Número de Emergencias al Día' => $healthData->numberOfEmergenciesDay ?? null
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
            $entities = Entities::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);

            $transformedData = [];
            foreach ($entities as $entity) {
                // Fetch health data for the current entity
                $healthData = Health::where('idEntities', $entity->id)->first();

                $transformedData[] = [
                    'id' => $entity->id,
                    'idHealth' => $healthData->id,
                    'uuid' => $entity->uuid,
                    'name' => $entity->name,
                    'address' => $entity->address,
                    'created_at' => $entity->created_at,
                    'updated_at' => $entity->updated_at,
                    'Pacientes en Emergencia' => $healthData->emergencyPatients ?? null,
                    'Camas de Emergencia Disponibles' => $healthData->emergencyBedsAvailable ?? null,
                    'Quirófanos Disponibles' => $healthData->availableOperatingRooms ?? null,
                    'Unidad de Cuidados Intensivos Disponible' => $healthData->intensiveCareUnitAvailable ?? null,
                    'Camas de Primer Nive' => $healthData->firstLevelBeds ?? null,
                    'Camas de Segundo Nivel' => $healthData->secondLevelBeds ?? null,
                    'Camas de Tercer Nivel' => $healthData->thirdLevelBeds ?? null,
                    'Banco de Sangre' => $healthData->bloodBank ?? null,
                    'Médicos en Turno' => $healthData->doctorsInTheShift ?? null,
                    'Enfermeras en Turno' => $healthData->nursesInTheShift ?? null,
                    'IPS Afiliada' => $healthData->affiliatedIps ?? null,
                    'Número de Emergencias al Día' => $healthData->numberOfEmergenciesDay ?? null
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'pagination' => [
                        'total' => $entities->total(),
                        'perPage' => $entities->perPage(),
                        'currentPage' => $entities->currentPage(),
                        'lastPage' => $entities->lastPage(),
                        'from' => $entities->firstItem(),
                        'to' => $entities->lastItem(),
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
    public function store(EntitiesRequest $request)
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
            $entities = new Entities();
            $entities->name = $request->name;
            $entities->address = $request->address;
            $entities->pointCoordinates = json_encode($request->pointCoordinates);
            $entities->save();

            return Response::json([
                'status' => 'succes',
                'data' => $entities
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

            $entities = Entities::find($id);
            if ($request->name != null) {
                $entities->name = $request->name;
            }
            if ($request->address != null) {
                $entities->address = $request->address;
            }
            if ($request->pointCoordinates != null) {
                $entities->pointCoordinates = json_encode($request->pointCoordinates);
            }
            $entities->save();

            return Response::json([
                'status' => 'succes',
                'data' => $entities
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

            return Entities::destroy($id);

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
                $entities = new Entities();
                $entities->name = $Data['name'];
                $entities->address = $Data['address'];
                $entities->pointCoordinates = json_encode($Data['pointCoordinates']);
                $entities->save();
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
