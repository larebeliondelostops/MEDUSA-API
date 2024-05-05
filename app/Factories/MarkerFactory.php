<?php

namespace App\Factories;

use App\Models\Marker;
use App\Cache\Markers\MarkerCache;
use App\Interfaces\Markers\LinesInterface;
use App\Interfaces\Markers\PointsInterface;
use App\Interfaces\Markers\PolygonsInterface;

class MarkerFactory
{
    public function getStrategyPoints($slug_id) : PointsInterface
    {
        $markerClass = Marker::where('marker_type', 1)->where('slug', $slug_id)->firstOrFail();

        $strategy = app($markerClass->namespace);

        return new MarkerCache($strategy);
    }

    public function getStrategyLines($slug_id) : LinesInterface
    {
        $markerClass = Marker::where('marker_type', 2)->where('slug', $slug_id)->firstOrFail();

        return app($markerClass->namespace);
    }

    public function getStrategyPolygons($slug_id) : PolygonsInterface
    {
        $markerClass = Marker::where('marker_type', 3)->where('slug', $slug_id)->firstOrFail();

        return app($markerClass->namespace);
    }
}