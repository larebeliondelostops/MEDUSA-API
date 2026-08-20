<?php

namespace App\Strategies\StrategiesPolygons\Cologne;

use App\Interfaces\Markers\PolygonsInterface;
use App\Models\Cologne\Geodata;
use InvalidArgumentException;

class StrategyCologneParks implements PolygonsInterface
{
    private const SLUG_ID = 210;

    public function __construct(
        private Geodata $model,
        int $slugId
    ) {
        if ($slugId !== self::SLUG_ID) {
            throw new InvalidArgumentException("Slug de parques de Colonia no soportado: {$slugId}");
        }
    }

    public function getModel(): Geodata
    {
        return $this->model->forDataset('parks');
    }

    public function allPolygons(): array
    {
        return $this->getModel()
            ->newQuery()
            ->where('dataset', 'parks')
            ->where('geometry_type', 'Polygon')
            ->get()
            ->map(fn (Geodata $item) => [
                'markerType' => self::SLUG_ID,
                'id' => $item->uuid,
                'title' => $item->name,
                'properties' => $item->properties ?? [],
                'position' => $item->geometry,
            ])
            ->toArray();
    }
}
