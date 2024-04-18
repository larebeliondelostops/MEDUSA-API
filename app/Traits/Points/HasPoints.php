<?php

namespace App\Traits\Points;

use App\Models\Slug;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

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

    public function show() : array
    {
        $point = [
            'id' => $this->uuid,
            'markerType' => Slug::where('name', $this->slug)->first()->id,
            'position' => [
                'type' => "Point",
                'coordinates' => [[(float)$this->latitude , (float)$this->longitude]]
            ]
        ];
        
        $point = $point + $this->pointPropertiesToShow();

        return $point;
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