<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\RateLimiter;
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
                $coordinates = $incident->position;
                //$geometry = $coordinates['features'][0]['geometry'];

                $transformedData[] = [
                    'type' => 'feature',
                    'markerType' => 8,
                    'id' => $incident->uuid,
                    'title' => $incident->name,
                    'geometry' => $coordinates,
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

    public function allTable(Request $request)
    {
        try {
            // Obtener fechas de inicio y fin
            $start = $request->start;
            $end = $request->end;
            // Aplicar la restricción whereBetween en la consulta
            if ($start && $end) {
            $incidents = Incident::whereBetween('created_at', [$start, $end])
                ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }else{
                $incidents = Incident::paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }

            $transformedData = [];
            foreach ($incidents as $incident) {
                $transformedData[] = [
                    'ID' => $incident->id,
                    'Nombre' => $incident->description,
                    'Indicador' => $incident->Indicator->Name,
                    'Direccion' => $incident->address,
                    'Fecha' => substr($incident->created_at, 0, 10),
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'title' => 'Incidentes App',
                    'pagination' => [
                        'total' => $incidents->total(),
                        'perPage' => $incidents->perPage(),
                        'currentPage' => $incidents->currentPage(),
                        'lastPage' => $incidents->lastPage(),
                        'from' => $incidents->firstItem(),
                        'to' => $incidents->lastItem(),
                    ],
                    'filterDate' => true,
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentRequest $request)
    {
        $user = $request->user(); // Obtener el usuario actual

        // Aplicar límite de tasa por usuario
        if ($user) {
            $userId = $user->id;
            $limitKey = "store_limit_$userId";

            // Intentos máximos: 3
            $rateLimit = 30;
            $decaySeconds= 60;

            if (RateLimiter::tooManyAttempts($limitKey, $rateLimit, $decaySeconds)) {
                $timeUntilUnlock = RateLimiter::availableIn($limitKey);

                return Response::json([
                    'code' => '3002',
                    'status' => 'error',
                    'message' => 'Límite de llamadas alcanzado. Inténtalo más tarde.',
                    'retry_after' => $timeUntilUnlock,
                ], 429);
            }
        }

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

            $photo = Storage::disk('public')->put('', $request->file('image'));

            $incident = new Incident();
            $incident->uuid = Uuid::uuid4()->toString();
            $incident->indicator = $request->IndicatorId;
            $incident->address = $request->address;
            $incident->description = $request->description;
            $incident->image = $photo;
            $incident->position = $request->pointCoordinates;
            $incident->day = Carbon::now()->dayOfWeek;
            $incident->month = date('m');
            $incident->year = date('Y');

            $incident->save();

            // Incrementar el contador del límite de tasa por usuario
            if ($user) {
                RateLimiter::hit($limitKey, $decaySeconds);
            }
            return Response::json([
                'status' => 'succes',
                'data' => $incident,
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
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($incident)
    {
        try {

            $incident = Incident::with('Indicator')->where('uuid', $incident)->first();

            return Response::json([
                'status' => 'succes',
                'data' => [
                    'id' => $incident->uuid,
                    'indicator' => $incident->indicator,
                    'date' => $incident->created_at,
                    'address' => $incident->address,
                    'description' => $incident->description,
                    'image' => tenant('id') . '/' . $incident->image,
                    'position' => $incident->position,
                    'titile' => $incident->Indicator->Name
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

            $incident = Incident::find($id);
            $incident->indicator = $request->IndicatorId ?? $incident->indicator;
            $incident->address = $request->address ?? $incident->address;
            $incident->description = $request->description ?? $incident->description;
            $incident->image = $photoPath ?? $incident->photoPath;
            $incident->position = $request->pointCoordinates ?? $incident->position;
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

        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function inspection()
    {
        try {

            $incidents = Incident::with('Indicator')->where('reviewed', false)->get();
            
            $incidents = $incidents->map(function ($incident) {
                $data = [
                    'identifier' => $incident->uuid,
                    'incident' => $incident->indicator,
                    'date' => $incident->created_at,
                    'position' => $incident->position,
                    'title' => $incident->Indicator->name
                ];

                return $data;
            });

            return Response::json([
                'status' => 'succes',
                'data' => $incidents
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

    public function review(Request $request)
    {
        try {

            $incident = Incident::where('uuid', $request->incident)->first();

            if (isset($incident)) {
                
                $incident->update(['reviewed' => true]);

                return Response::json([
                    'status' => 'succes',
                    'data' => $incident
                ], 202, [], JSON_PRETTY_PRINT);
            } else {
                return Response::json([
                    'status' => 'error',
                    'message' => 'No existe un registro con el id' . $request->incident
                ], 400, [], JSON_PRETTY_PRINT);
            }
            
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
