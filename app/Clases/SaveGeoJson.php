<?php

namespace App\Clases;

use Illuminate\Http\Request;

class SaveGeoJson
{

    public static function saveLikePoint($position)
    {
        return json_encode([
            'features' => [
                [
                    'type' => 'Feature',
                    'geometry' => $position
                ]
            ]
        ]);
    }
}