<?php

namespace App\Factories;

use Exception;
use App\Models\Marker;
use App\Interfaces\Heatmaps\HeatmapActionsInterface;

class HeatmapFactory
{
    public function getStrategy($slug_id) : HeatmapActionsInterface
    {
        $markerClass = Marker::where('marker_type', 1)->where('slug', $slug_id)->first();

        if (!isset($markerClass)) {
            throw new Exception('No se encontro el marcador para Heatmap');
        }
        return app($markerClass->namespace);
    }
}