<?php

namespace App\Http\Controllers;

use App\Models\Cologne\Geodata;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CologneMarkerTableController extends Controller
{
    private const DATASETS = [
        'traffic_lights' => 'Traffic lights',
        'parking_ticket_machines' => 'Parking meters',
    ];

    public function index(Request $request, string $dataset): JsonResponse
    {
        $this->ensureCologneDataset($dataset);

        $perPage = max(1, min(100, (int) $request->input('count', 10)));
        $page = max(1, (int) $request->input('page', 1));

        $items = Geodata::query()
            ->where('dataset', $dataset)
            ->orderBy('id')
            ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $items->map(fn (Geodata $item): array => [
                'ID' => $item->uuid,
                'Name' => $item->name,
                'Latitude' => $item->latitude,
                'Longitude' => $item->longitude,
            ])->values(),
            'meta' => [
                'title' => self::DATASETS[$dataset],
                'pagination' => [
                    'total' => $items->total(),
                    'perPage' => $items->perPage(),
                    'currentPage' => $items->currentPage(),
                    'lastPage' => $items->lastPage(),
                    'from' => $items->firstItem(),
                    'to' => $items->lastItem(),
                ],
                'filterDate' => false,
                'ableCreate' => false,
                'ableEdit' => false,
                'ableDelete' => false,
            ],
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function show(string $dataset, string $uuid): JsonResponse
    {
        $this->ensureCologneDataset($dataset);

        $item = Geodata::query()
            ->where('dataset', $dataset)
            ->where('uuid', $uuid)
            ->first();

        if (! $item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Marker not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'succes',
            'data' => [
                'id' => $item->uuid,
                'name' => $item->name,
                'latitude' => $item->latitude,
                'longitude' => $item->longitude,
                'properties' => $item->properties ?? [],
            ],
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function readOnly(string $dataset, ?string $uuid = null): JsonResponse
    {
        $this->ensureCologneDataset($dataset);

        return response()->json([
            'status' => 'error',
            'message' => 'This Cologne dataset is read-only.',
        ], 405);
    }

    private function ensureCologneDataset(string $dataset): void
    {
        abort_unless(tenant('id') === 'cologne' && isset(self::DATASETS[$dataset]), 404);
    }
}
