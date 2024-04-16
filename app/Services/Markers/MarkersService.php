<?php

namespace App\Services\Markers;

use App\Models\Marker;
use App\Factories\MarkerFactory;
use Illuminate\Support\Facades\Auth;
use App\Traits\Markers\MarkersByDomain;
use App\Interfaces\Markers\MarkersInterface;
use Illuminate\Support\Facades\Log;

class MarkersService implements MarkersInterface
{
    public function __construct(
        private MarkerFactory $factory
    ) {}

    public function allPoints()
    {
        $user = Auth::user();

        $permisos = $user->getAllPermissions()->pluck('name');

        $permisos = $permisos->filter(function ($item) {
            return strpos($item, 'commandbar-') === 0;
        });

        $permisos = $permisos->map(function ($item) {
            // Obtener la parte después del guion
            return substr($item, strpos($item, '-') + 1);
        });

        $pointsMarkers = Marker::where('marker_type', 1 )->whereIn('name', $permisos->toArray())->pluck('slug')->toArray();

        $points = [];

        foreach ($pointsMarkers as $key) {
            $strategy = $this->factory->getStrategyPoints($key);
            $data = $strategy->allPoints();
            $points = array_merge($points, $data->toArray());
        }

        return $points;
    }

    public function allLines()
    {
        $LinesMarkers = Marker::where('marker_type', 2)->pluck('slug')->toArray();

        $lines = [];

        foreach ($LinesMarkers as $key) {
            $strategy = $this->factory->getStrategyLines($key);
            $data = $strategy->allLines();
            $lines = array_merge($lines, $data);
        }

        return $lines;
    }

    public function allPolygons()
    {
        $polygonsMarkers = Marker::where('marker_type', 3)->pluck('slug')->toArray();

        $polygons = [];

        foreach ($polygonsMarkers as $key) {
            $strategy = $this->factory->getStrategyPolygons($key);
            $data = $strategy->allPolygons();
            $polygons = array_merge($polygons, $data);
        }

        return $polygons;
    }

    public function getInfoPoint($uuid, $markerType)
    {
        $strategy = $this->factory->getStrategyPoints($markerType);
        $data = $strategy->getInfoPoint($uuid);

        return $data;
    }
}