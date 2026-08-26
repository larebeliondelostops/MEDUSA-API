<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Support\TenantLanguage;
use App\Support\TenantIncidentBroadcaster;
use App\Models\Villavicencio\Incident;
use App\Strategies\StrategiesReports\Villavicencio\StrategyIncidentsReports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

            $incidents = Incident::query()->with('Indicator.parent')->orderByDesc('id')->get();

            $transformedData = [];
            foreach ($incidents as $incident) {
                $coordinates = $incident->latitude . ', ' .$incident->longitude;
                //$geometry = $coordinates['features'][0]['geometry'];

                $transformedData[] = [
                    'type' => 'feature',
                    'markerType' => 8,
                    'id' => $incident->uuid,
                    'title' => $incident->name,
                    'geometry' => $coordinates,
                    'properties' => [
                        TenantLanguage::text('Direccion', 'Address') => $incident->address
                    ]
                ];
            }

            return Response::json($transformedData, 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')
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
            $incidents = Incident::with('Indicator.parent')->orderByDesc('id')->whereBetween('created_at', [$start, $end])
                ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }else{
                $incidents = Incident::with('Indicator.parent')->orderByDesc('id')->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);
            }

            $transformedData = [];
            foreach ($incidents as $incident) {
                $transformedData[] = [
                    TenantLanguage::text('ID', 'ID') => $incident->id,
                    TenantLanguage::text('Nombre', 'Name') => $incident->description,
                    TenantLanguage::text('Categoria', 'Category') => $this->categoryName($incident),
                    TenantLanguage::text('Subcategoria', 'Subcategory') => $this->subcategoryName($incident),
                    TenantLanguage::text('Direccion', 'Address') => $incident->address,
                    TenantLanguage::text('Fecha', 'Date') => substr($incident->created_at, 0, 10),
                ];
            }

            return response()->json([
                'data' => $transformedData,
                'meta' => [
                    'title' => TenantLanguage::text('Incidentes App', 'Incidents App'),
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
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')
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
                    'message' => TenantLanguage::text('Límite de llamadas alcanzado. Inténtalo más tarde.', 'Rate limit reached. Try again later.'),
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
                    'message' => TenantLanguage::text('Datos Recibidos Incorrectos', 'Invalid data received'),
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $photo = $request->hasFile('image')
                ? Storage::disk('public')->put('', $request->file('image'))
                : null;

            $coordenadas = $this->extractCoordinates($request->pointCoordinates);
            if (! $coordenadas) {
                return Response::json([
                    'status' => 'error',
                    'message' => TenantLanguage::text('El formato de las coordenadas no es válido', 'The coordinates format is invalid')
                ], 422, [], JSON_PRETTY_PRINT);
            }

            $incident = new Incident();
            $incident->uuid = Uuid::uuid4()->toString();
            $incident->indicator_id = $request->IndicatorId;
            $incident->address = $request->address;
            $incident->description = $request->description;
            $incident->image = $photo;
            $incident->latitude = $coordenadas[1];
            $incident->longitude = $coordenadas[0];
            $incident->day = Carbon::now()->dayOfWeek;
            $incident->month = date('m');
            $incident->year = date('Y');

            $incident->save();
            $incident->load('Indicator.parent');
            Cache::forget(StrategyIncidentsReports::CACHE_KEY);
            $responseData = $this->incidentResponseData($incident);
            TenantIncidentBroadcaster::broadcast('created', $responseData);

            // Incrementar el contador del límite de tasa por usuario
            if ($user) {
                RateLimiter::hit($limitKey, $decaySeconds);
            }
            return Response::json([
                'status' => 'succes',
                'data' => $responseData,
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')
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
            $incident = $this->findIncidentByIdentifier($incident);

            if (! $incident) {
                return Response::json([
                    'status' => 'error',
                    'message' => TenantLanguage::text('No existe un incidente con el identificador enviado', 'There is no incident with the provided identifier')
                ], 404, [], JSON_PRETTY_PRINT);
            }

            return Response::json([
                'status' => 'succes',
                'data' => [
                    'id' => $incident->uuid,
                    'indicator' => $incident->indicator_id,
                    'category' => $this->categoryData($incident),
                    'subcategory' => $this->subcategoryData($incident),
                    'date' => $incident->created_at,
                    'address' => $incident->address,
                    'description' => $incident->description,
                    'image' => tenant('id') . '/' . $incident->image,
                    'position' => $incident->position,
                    'titile' => TenantLanguage::indicator(optional($incident->Indicator)->name),
                    'title' => TenantLanguage::indicator(optional($incident->Indicator)->name)
                ]
            ], 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')
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
                    'message' => TenantLanguage::text('Datos Recibidos Incorrectos', 'Invalid data received'),
                    'errors' => $request->validator->messages()
                ], 400, [], JSON_PRETTY_PRINT);
            }

            $incident = $this->findIncidentByIdentifier($id);

            if (! $incident) {
                return Response::json([
                    'code' => '2004',
                    'status' => 'error',
                    'message' => TenantLanguage::text('No existe un incidente con el identificador enviado', 'There is no incident with the provided identifier')
                ], 404, [], JSON_PRETTY_PRINT);
            }

            if ($request->has('IndicatorId')) {
                $incident->indicator_id = $request->IndicatorId;
            }

            $incident->address = $request->address ?? $incident->address;
            $incident->description = $request->description ?? $incident->description;

            if ($request->filled('pointCoordinates')) {
                $coordinates = $this->extractCoordinates($request->pointCoordinates);
                if ($coordinates) {
                    [$incident->longitude, $incident->latitude] = $coordinates;
                }
            }

            if ($request->hasFile('image')) {
                $photoFile = $request->file('image');
                $extension = $photoFile->getClientOriginalExtension();
                $filename = Uuid::uuid4()->toString() . '.' . $extension;
                $incident->image = $photoFile->storeAs('photos', $filename, 'public');
            }

            $incident->save();
            $incident->load('Indicator.parent');
            Cache::forget(StrategyIncidentsReports::CACHE_KEY);
            $responseData = $this->incidentResponseData($incident);
            TenantIncidentBroadcaster::broadcast('updated', $responseData);

            return Response::json([
                'status' => 'succes',
                'data' => $responseData
            ], 201, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')
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
            $incident = $this->findIncidentByIdentifier((string) $id);
            if (! $incident) {
                return 0;
            }

            $responseData = $this->incidentResponseData($incident);
            $deleted = (int) $incident->delete();
            if ($deleted) {
                Cache::forget(StrategyIncidentsReports::CACHE_KEY);
                TenantIncidentBroadcaster::broadcast('deleted', $responseData);
            }

            return $deleted;

        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function inspection()
    {
        try {

            $incidents = Incident::with('Indicator.parent')->where('reviewed', false)->orderBy('id', 'ASC')->get();
            
            $incidents = $incidents->map(function ($incident) {

                $data = [
                    'identifier' => $incident->uuid,
                    'incident' => $incident->indicator_id,
                    'category' => $this->categoryData($incident),
                    'subcategory' => $this->subcategoryData($incident),
                    'date' => $incident->created_at,
                    'position' => $incident->longitude . ', ' .$incident->latitude,
                    'title' => optional($incident->Indicator)->name
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
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function review(Request $request)
    {
        try {

            $incident = Incident::where('uuid', $request->incident)->first();

            if (isset($incident)) {
                
                $incident->update(['reviewed' => true]);
                $incident->load('Indicator.parent');
                TenantIncidentBroadcaster::broadcast('reviewed', $this->incidentResponseData($incident));

                return Response::json([
                    'status' => 'succes',
                    'data' => $incident
                ], 202, [], JSON_PRETTY_PRINT);
            } else {
                return Response::json([
                    'status' => 'error',
                    'message' => TenantLanguage::text('No existe un registro con el id' . $request->incident, 'No record exists with id ' . $request->incident)
                ], 400, [], JSON_PRETTY_PRINT);
            }
            
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => TenantLanguage::text('Error En La Generación De La Solicitud', 'Error generating the request')
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    private function findIncidentByIdentifier(string $identifier): ?Incident
    {
        $query = Incident::query()->with('Indicator.parent');

        if (ctype_digit($identifier)) {
            return $query->whereKey((int) $identifier)->first();
        }

        return Uuid::isValid($identifier)
            ? $query->where('uuid', $identifier)->first()
            : null;
    }

    private function categoryData(Incident $incident): ?array
    {
        $indicator = $incident->Indicator;
        if (! $indicator) {
            return null;
        }

        $category = $indicator->parent ?: $indicator;

        return ['id' => $category->id, 'name' => TenantLanguage::indicator($category->name)];
    }

    private function subcategoryData(Incident $incident): ?array
    {
        $indicator = $incident->Indicator;
        if (! $indicator || ! $indicator->parent_indicator_id) {
            return null;
        }

        return ['id' => $indicator->id, 'name' => TenantLanguage::indicator($indicator->name)];
    }

    private function categoryName(Incident $incident): ?string
    {
        return $this->categoryData($incident)['name'] ?? null;
    }

    private function subcategoryName(Incident $incident): ?string
    {
        return $this->subcategoryData($incident)['name'] ?? null;
    }

    private function incidentResponseData(Incident $incident): array
    {
        // Conserva los atributos historicos y agrega la clasificacion normalizada.
        $data = $incident->toArray();
        $category = $this->categoryData($incident);
        $subcategory = $this->subcategoryData($incident);

        $data['CategoryId'] = $category['id'] ?? null;
        $data['IndicatorId'] = $subcategory['id'] ?? null;
        $data['category'] = $category;
        $data['subcategory'] = $subcategory;
        $data['pointCoordinates'] = $incident->position;

        return $data;
    }

    private function extractCoordinates($value): ?array
    {
        if (is_string($value)) {
            $coordinates = array_map('trim', explode(',', $value));
            return count($coordinates) === 2 ? $coordinates : null;
        }

        if (is_array($value)) {
            $coordinates = data_get($value, 'features.0.geometry.coordinates', data_get($value, 'coordinates'));
            if (is_array($coordinates) && isset($coordinates[0]) && is_array($coordinates[0])) {
                $coordinates = $coordinates[0];
            }
            if (is_array($coordinates) && count($coordinates) >= 2) {
                return [$coordinates[0], $coordinates[1]];
            }
        }

        return null;
    }
}
