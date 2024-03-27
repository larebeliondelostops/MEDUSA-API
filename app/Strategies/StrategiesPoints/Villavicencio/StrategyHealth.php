<?php

namespace App\Strategies\StrategiesPoints\Villavicencio;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Models\Villavicencio\Health;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Interfaces\Markers\PointsInterface;

class StrategyHealth implements PointsInterface
{

    public function __construct(
        private Health $model
    ) {}

    public function getModel() : Health
    {
        return $this->model;
    }

    public function allPoints()
    {
        return $this->model->allPoints();
    }

    public function getInfoPoint($id)
    {
        $health = $this->model->where('uuid', $id)->first();

        $health = [
            'title' => $health->name,
            'properties' => [
                'Direccion' => $health->address,
                'Pacientes en Emergencia' => $health->emergencyPatients ?? null,
                'Camas de Emergencia Disponibles' => $health->emergencyBedsAvailable ?? null,
                'Quirófanos Disponibles' => $health->availableOperatingRooms ?? null,
                'Unidad de Cuidados Intensivos Disponible' => $health->intensiveCareUnitAvailable ?? null,
                'Camas de Primer Nive' => $health->firstLevelBeds ?? null,
                'Camas de Segundo Nivel' => $health->secondLevelBeds ?? null,
                'Camas de Tercer Nivel' => $health->thirdLevelBeds ?? null,
                'Banco de Sangre' => $health->bloodBank ?? null,
                'Médicos en Turno' => $health->doctorsInTheShift ?? null,
                'Enfermeras en Turno' => $health->nursesInTheShift ?? null,
                'IPS Afiliada' => $health->affiliatedIps ?? null,
                'Número de Emergencias al Día' => $health->numberOfEmergenciesDay ?? null
            ]
        ];

        return $health;
    }

    public function getOne($id)
    {
        try {
            $health = Health::find($id);

            return Response::json([
                'status' => 'succes',
                'data' => [
                    'name' => $health->name,
                    'address' => $health->address,
                    'emergencyPatients' => $health->emergencyPatients,
                    'emergencyBedsAvailable' => $health->emergencyBedsAvailable,
                    'availableOperatingRooms' => $health->availableOperatingRooms,
                    'intensiveCareUnitAvailable' => $health->intensiveCareUnitAvailable,
                    'firstLevelBeds' => $health->firstLevelBeds,
                    'secondLevelBeds' => $health->secondLevelBeds,
                    'thirdLevelBeds' => $health->thirdLevelBeds,
                    'bloodBank' => $health->bloodBank,
                    'doctorsInTheShift' => $health->doctorsInTheShift,
                    'nursesInTheShift' => $health->nursesInTheShift,
                    'affiliatedIps' => $health->affiliatedIps,
                    'numberOfEmergenciesDay' => $health->numberOfEmergenciesDay,
                    'position' => [
                        'type' => "Point",
                        'coordinates' => json_decode($health->position)->coordinates
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
                $health = Health::orderBy('id')->whereBetween('created_at', [$start, $end])
                    ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            } else {
                $health = Health::orderBy('id')->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }

            $transformedData = [];
            foreach ($health as $healthData) {
                $transformedData[] = [
                    'ID' => $healthData->id,
                    'Nombre' => $healthData->name,
                    'Direccion' => $healthData->address,
                    'IPS Afiliada' => $healthData->affiliatedIps ?? null,
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'title' => 'Centros de Salud',
                    'pagination' => [
                        'total' => $health->total(),
                        'perPage' => $health->perPage(),
                        'currentPage' => $health->currentPage(),
                        'lastPage' => $health->lastPage(),
                        'from' => $health->firstItem(),
                        'to' => $health->lastItem(),
                    ],
                    'ableCreate' => true
                ],
            ], 200, [], JSON_PRETTY_PRINT);
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
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
    public function store(Request $request)
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
        $health->uuid = Uuid::uuid4()->toString();
        $health->name = $request->name;
        $health->address = $request->address;
        $health->position = json_encode($request->position);
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
        $health->numberOfEmergenciesDay = $request->numberOfEmergenciesDay;
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

            if($request->name != null){
                $health->name = $request->name;
            }
            if($request->address != null){
                $health->address = $request->address;
            }
            if($request->position != null){
                $health->position = json_encode($request->position);
            }
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
                $health->idhealth = $Data['idhealth'];
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
                $health->numberOfEmergenciesDay = $Data['numberOfEmergenciesDay'];
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
