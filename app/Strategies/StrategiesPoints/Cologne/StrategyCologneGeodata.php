<?php

namespace App\Strategies\StrategiesPoints\Cologne;

use App\Interfaces\Markers\PointsInterface;
use App\Models\Cologne\Geodata;
use Illuminate\Support\Collection;
use InvalidArgumentException;

class StrategyCologneGeodata implements PointsInterface
{
    private const DATASETS = [
        200 => 'refugee_accommodation',
        201 => 'bus_parking',
        202 => 'libraries',
        203 => 'intercultural_centers',
        204 => 'cemetery_entrances',
        205 => 'schools',
        206 => 'hospitals',
        207 => 'natural_monuments',
        208 => 'museums',
        209 => 'parking_ticket_machines',
        211 => 'wifi_access_points',
        212 => 'traffic_lights',
    ];

    private string $dataset;

    public function __construct(
        private Geodata $model,
        private int $slugId
    ) {
        $this->dataset = self::DATASETS[$slugId]
            ?? throw new InvalidArgumentException("Slug de marcador de Colonia no soportado: {$slugId}");
    }

    public function getModel(): Geodata
    {
        return $this->model->forDataset($this->dataset);
    }

    public function allPoints(): Collection
    {
        return $this->getModel()
            ->newQuery()
            ->where('dataset', $this->dataset)
            ->where('geometry_type', 'Point')
            ->get()
            ->map(function (Geodata $item): array {
                return [
                    'markerType' => $this->slugId,
                    'id' => $item->uuid,
                    'title' => $item->name,
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [$item->latitude, $item->longitude],
                    ],
                ];
            });
    }

    public function getInfoPoint($id): array
    {
        $item = $this->getModel()
            ->newQuery()
            ->where('dataset', $this->dataset)
            ->where('uuid', $id)
            ->firstOrFail();

        return [
            'title' => $item->name,
            'properties' => $item->properties ?? [],
        ];
    }
}
