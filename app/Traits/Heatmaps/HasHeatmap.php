<?php

namespace App\Traits\Heatmaps;

use App\Models\Slug;
use Illuminate\Support\Collection;

trait HasHeatmap
{
    public function allPointsHeatMap() : ?array
    {
        $rows = $this->select('latitude', 'latitude')->get();
    
        $features = [];

        foreach ($rows as $row) {

            $feature = [
                "type" => "Feature",
                'specialType' => 4,
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [$row->latitude, $row->latitude]
                ]
            ];
            $features[] = $feature;
        }
    
        $geojson = [
            "type" => "FeatureCollection",
            "features" => $features
        ];

        return $geojson;
    }
}