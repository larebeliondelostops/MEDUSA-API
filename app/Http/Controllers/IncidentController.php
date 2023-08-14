<?php

namespace App\Http\Controllers;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Http\Request\Incidents\IncidentRequest;

/**
 * Controlador Incidentes.
 *
 * Controlador que maneja la lógica de los incidentes reportados.
 *
 * @package    Controllers
 * @copyright  2023 Ignicion Games S.A.S.
 * @author     Johan Caicedo <jecg2509@gmail.com>
 * @version    v1.0.0
 */
class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $incidents = Incident::all();

            $transformedData = [];
            foreach ($incidents as $incident) {
                $coordinates = json_decode($incident->pointCoordinates, true);
                $geometry = $coordinates['features'][0]['geometry'];

                $transformedData[] = [
                    'type' => 'feature',
                    'markerType' => 8,
                    'id' => $incident->uuid,
                    'title' => $incident->name,
                    'geometry' => $geometry,
                    'properties' => [
                        'Direccion' => $incident->address
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentRequest $request)
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

            $photoFile = $request->file('image');
            $extension = $photoFile->getClientOriginalExtension();
            $filename = Uuid::uuid4()->toString() . '.' . $extension;
            $photoPath = $photoFile->storeAs('photos', $filename, 'public');

            $incident = new Incident();
            $incident->IndicatorId = $request->IndicatorId;
            $incident->address = $request->address;
            $incident->description = $request->description;
            $incident->image = $photoPath;
            $incident->pointCoordinates = json_encode($request->pointCoordinates);
            $incident->save();

            return Response::json([
                'status' => 'succes',
                'data' => $incident
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($incident)
    {
        try {

            $incident = Incident::find($incident);

            return Response::json([
                'status' => 'succes',
                'data' => $incident
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncidentRequest $request, $id)
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

            $photoFile = $request->file('image');
            $extension = $photoFile->getClientOriginalExtension();
            $filename = Uuid::uuid4()->toString() . '.' . $extension;
            $photoPath = $photoFile->storeAs('photos', $filename, 'public');

            $incident = new Incident();
            $incident->IndicatorId = $request->IndicatorId;
            $incident->address = $request->address;
            $incident->description = $request->description;
            $incident->image = $photoPath;
            $incident->pointCoordinates = json_encode($request->pointCoordinates);
            $incident->save();

            return Response::json([
                'status' => 'succes',
                'data' => $incident
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            return Incident::destroy($id);

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
