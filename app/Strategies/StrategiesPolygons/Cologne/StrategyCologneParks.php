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
            ->flatMap(function (Geodata $item): array {
                $rings = $this->exteriorRings($item->geometry ?? []);

                return array_map(function (array $ring) use ($item): array {
                    $properties = $item->properties ?? [];
                    $properties['sourceFeatureId'] = $item->uuid;
                    $properties['ringIndex'] = $ring['index'];

                    return [
                        'markerType' => self::SLUG_ID,
                        'id' => $ring['index'] === 0
                            ? $item->uuid
                            : "{$item->uuid}-ring-{$ring['index']}",
                        'title' => $item->name,
                        'properties' => $properties,
                        // El frontend espera un unico contorno en coordinates, como
                        // los poligonos de comunas, no el arreglo de anillos de ESRI.
                        'position' => [
                            'type' => 'Polygon',
                            'coordinates' => $ring['coordinates'],
                        ],
                    ];
                }, $rings);
            })
            ->values()
            ->toArray();
    }

    /**
     * Devuelve solamente los contornos exteriores. En ArcGIS los exteriores son
     * horarios y los huecos antihorarios; el frontend no admite huecos anidados.
     */
    private function exteriorRings(array $geometry): array
    {
        $coordinates = $geometry['coordinates'] ?? [];

        if ($coordinates === [] || ! is_array($coordinates)) {
            return [];
        }

        // Compatibilidad con geometria que ya tenga el formato simple del frontend.
        if (isset($coordinates[0][0]) && is_numeric($coordinates[0][0])) {
            return [['index' => 0, 'coordinates' => $coordinates]];
        }

        $rings = [];

        foreach ($coordinates as $index => $ring) {
            if (! is_array($ring) || count($ring) < 4 || ! $this->isClockwise($ring)) {
                continue;
            }

            $rings[] = [
                'index' => $index,
                'coordinates' => $ring,
            ];
        }

        // Una fuente sin orientacion ArcGIS valida sigue siendo visible.
        if ($rings === []) {
            foreach ($coordinates as $index => $ring) {
                if (is_array($ring) && count($ring) >= 4) {
                    $rings[] = [
                        'index' => $index,
                        'coordinates' => $ring,
                    ];
                }
            }
        }

        return $rings;
    }

    private function isClockwise(array $ring): bool
    {
        $area = 0.0;

        for ($index = 0, $last = count($ring) - 1; $index < $last; $index++) {
            if (! isset($ring[$index][0], $ring[$index][1], $ring[$index + 1][0], $ring[$index + 1][1])) {
                return false;
            }

            // Los puntos se guardan como [latitud, longitud]; para calcular la
            // orientacion se usa longitud como X y latitud como Y.
            $x1 = (float) $ring[$index][1];
            $y1 = (float) $ring[$index][0];
            $x2 = (float) $ring[$index + 1][1];
            $y2 = (float) $ring[$index + 1][0];
            $area += ($x2 - $x1) * ($y2 + $y1);
        }

        return $area > 0;
    }
}
