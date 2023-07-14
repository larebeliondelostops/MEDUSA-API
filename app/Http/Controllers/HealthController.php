<?php

namespace App\Http\Controllers;

use App\Http\Request\Health\HealthRequest;
use Exception;
use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;



/**
 * Controlador Maneja Lógica de Salud.
 *
 * Controlador que maneja la lógica de centros de salud y las modificaciones posibles con el sistema.
 *
 * @package    Controllers
 * @copyright  2023 Ignicion S.A.S.
 * @author     David Acosta Ojeda <Dacostaojeda2000@gmail.com>
 * @version    v1.0.0
 */
class HealthController extends Controller
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
    public function update(HealthRequest $request, $id)
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

            $health->update($request->all());


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
}
