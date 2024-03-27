<?php

namespace App\Traits\Points;

use App\Models\Slug;
use Illuminate\Support\Collection;

trait HasPoints
{
    public function allPoints() : Collection
    {
        $data = $this::all();

        $points = $data->map(function ($item) {

            $point = [
                'markerType' => Slug::where('name', $this->slug)->first()->id,
                'id' => $item->uuid,
                'geometry' => [
                    'type' => "Point",
                    'coordinates' => [(float)$item->latitude , (float)$item->longitude]
                ]
            ];

            $point = $point + $item->pointProperties();

            return $point;
        });

        return $points;
    }

    public function getInfoPoint() : array
    {
        $point = [
            'title' => $this->name,
            'properties' => $this->attributesToArray()
        ];

        return $point;
    }
}