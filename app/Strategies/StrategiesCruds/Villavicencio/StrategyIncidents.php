<?php

namespace App\Strategies\StrategiesCruds\Villavicencio;

use App\Models\Villavicencio\Incident;
use App\Rules\Subindicator;
use App\Strategies\StrategiesCruds\BaseCrud;
use App\Strategies\StrategiesReports\Villavicencio\StrategyIncidentsReports;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class StrategyIncidents extends BaseCrud
{
    public function __construct(private Incident $model)
    {
    }

    public function getModel(): Incident
    {
        return $this->model;
    }

    public function index($request): array
    {
        $query = Incident::query()->with('Indicator.parent')->orderByDesc('id');
        if ($request->filled('start') && $request->filled('end')) {
            $query->whereBetween('created_at', [$request->start, $request->end]);
        }

        $incidents = $query->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);

        return [
            'data' => $incidents->map(function (Incident $incident) {
                return [
                    'ID' => $incident->id,
                    'Nombre' => $incident->description,
                    'Categoria' => $this->categoryName($incident),
                    'Subcategoria' => $this->subcategoryName($incident),
                    'Direccion' => $incident->address,
                    'Fecha' => optional($incident->created_at)->format('Y-m-d'),
                ];
            })->values(),
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
                'ableCreate' => true,
            ],
        ];
    }

    public function show($id): ?array
    {
        $incident = $this->findIncident($id);
        if (! $incident) {
            return null;
        }

        return $this->incidentData($incident);
    }

    public function store($request): array
    {
        Validator::make($request->all(), [
            'IndicatorId' => ['required', 'integer', new Subindicator()],
            'description' => ['required', 'string'],
            'pointCoordinates' => ['required'],
            'address' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ])->validate();

        $incident = new Incident();
        $incident->uuid = Uuid::uuid4()->toString();
        $this->fillIncident($incident, $request);
        $incident->day = Carbon::now()->dayOfWeek;
        $incident->month = date('m');
        $incident->year = date('Y');
        $incident->save();
        Cache::forget(StrategyIncidentsReports::CACHE_KEY);

        return $this->incidentData($incident->load('Indicator.parent'));
    }

    public function update($request, $id): ?array
    {
        $incident = $this->findIncident($id);
        if (! $incident) {
            return null;
        }

        $this->fillIncident($incident, $request);
        $incident->save();
        Cache::forget(StrategyIncidentsReports::CACHE_KEY);

        return $this->incidentData($incident->load('Indicator.parent'));
    }

    public function destroy($id): int
    {
        $incident = $this->findIncident($id);
        $deleted = $incident ? (int) $incident->delete() : 0;
        if ($deleted) {
            Cache::forget(StrategyIncidentsReports::CACHE_KEY);
        }

        return $deleted;
    }

    private function fillIncident(Incident $incident, Request $request): void
    {
        if ($request->filled('IndicatorId')) {
            $incident->indicator_id = $request->IndicatorId;
        }
        if ($request->has('address')) {
            $incident->address = $request->address;
        }
        if ($request->has('description')) {
            $incident->description = $request->description;
        }

        $coordinates = $this->coordinates($request->input('pointCoordinates', $request->input('position')));
        if ($coordinates) {
            [$incident->longitude, $incident->latitude] = $coordinates;
        }

        if ($request->hasFile('image')) {
            $incident->image = Storage::disk('public')->put('', $request->file('image'));
        }
    }

    private function coordinates($value): ?array
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

    private function findIncident($identifier): ?Incident
    {
        $query = Incident::query()->with('Indicator.parent');

        if (ctype_digit((string) $identifier)) {
            return $query->whereKey((int) $identifier)->first();
        }

        return Uuid::isValid((string) $identifier)
            ? $query->where('uuid', $identifier)->first()
            : null;
    }

    private function incidentData(Incident $incident): array
    {
        $indicator = $incident->Indicator;
        $category = $indicator?->parent ?: $indicator;

        return [
            'id' => $incident->id,
            'uuid' => $incident->uuid,
            'CategoryId' => $category?->id,
            'IndicatorId' => $indicator?->id,
            'category' => $category ? ['id' => $category->id, 'name' => $category->name] : null,
            'subcategory' => $indicator?->parent_indicator_id
                ? ['id' => $indicator->id, 'name' => $indicator->name]
                : null,
            'address' => $incident->address,
            'description' => $incident->description,
            'pointCoordinates' => $incident->position,
            'image' => $incident->image,
            'date' => $incident->created_at,
        ];
    }

    private function categoryName(Incident $incident): ?string
    {
        return $incident->Indicator?->parent?->name ?: $incident->Indicator?->name;
    }

    private function subcategoryName(Incident $incident): ?string
    {
        return $incident->Indicator?->parent_indicator_id ? $incident->Indicator->name : null;
    }
}
