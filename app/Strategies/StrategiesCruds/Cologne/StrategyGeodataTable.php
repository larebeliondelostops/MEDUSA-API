<?php

namespace App\Strategies\StrategiesCruds\Cologne;

use App\Interfaces\Cruds\CrudActionsInterface;
use App\Models\Cologne\Geodata;

abstract class StrategyGeodataTable implements CrudActionsInterface
{
    public function __construct(protected Geodata $model)
    {
    }

    abstract protected function dataset(): string;

    abstract protected function title(): string;

    public function index($request): array
    {
        $items = $this->model->newQuery()
            ->where('dataset', $this->dataset())
            ->orderBy('id')
            ->paginate($request->count ?? 10, ['*'], 'page', $request->page ?? 1);

        return [
            'data' => $items->map(fn (Geodata $item): array => [
                'ID' => $item->uuid,
                'Name' => $item->name,
                'Latitude' => $item->latitude,
                'Longitude' => $item->longitude,
            ])->values(),
            'meta' => [
                'title' => $this->title(),
                'pagination' => [
                    'total' => $items->total(),
                    'perPage' => $items->perPage(),
                    'currentPage' => $items->currentPage(),
                    'lastPage' => $items->lastPage(),
                    'from' => $items->firstItem(),
                    'to' => $items->lastItem(),
                ],
                'ableCreate' => false,
                'ableEdit' => false,
                'ableDelete' => false,
            ],
        ];
    }

    public function show($id): ?array
    {
        $item = $this->model->newQuery()
            ->where('dataset', $this->dataset())
            ->where('uuid', $id)
            ->first();

        if (! $item) {
            return null;
        }

        return [
            'id' => $item->uuid,
            'name' => $item->name,
            'latitude' => $item->latitude,
            'longitude' => $item->longitude,
            'properties' => $item->properties ?? [],
        ];
    }

    public function store($request)
    {
        return $this->readOnlyResponse();
    }

    public function update($request, $id)
    {
        return $this->readOnlyResponse();
    }

    public function destroy($id)
    {
        return $this->readOnlyResponse();
    }

    private function readOnlyResponse()
    {
        return response()->json([
            'status' => 'error',
            'message' => 'This Cologne dataset is read-only.',
        ], 405);
    }
}
