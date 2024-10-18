<?php

namespace App\Utils;
use App\Models\Villavicencio\ProbabilisticGrid;

class IncidentGrid
{
    public static function getGridIdByCoordinates(float $latitude, float $longitude) : int | null
    {
        $gridId = null;
        ProbabilisticGrid::chunk(53, function ($grids) use ($latitude, $longitude, &$gridId) {
            foreach ($grids as $grid) {
                $coordinates = json_decode($grid->coordinates, true);
                $coordinateA = $coordinates[0];
                $coordinateB = $coordinates[2];

                if ( $longitude > $coordinateB[0] )
                {
                    return;
                }
                
                if ($longitude > $coordinateA[0] && $latitude > $coordinateA[0] &&
                    $longitude <= $coordinateB[0] && $latitude <= $coordinateB[1]) {
                   
                    $gridId = $grid->id;
                    
                    return false; 
                }
            }
        });

        return $gridId;
    }
}