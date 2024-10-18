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
                $coordinateA = $grid->coordinates[0];
                $coordinateB = $grid->coordinates[2];
                if ( $latitude > $coordinateB[0][0] )
                {
                    return;
                }
                
                if ($latitude > $coordinateA[0] && $longitude > $coordinateA[0] &&
                    $latitude <= $coordinateB[0] && $longitude <= $coordinateB[1]) {
                   
                    $gridId = $grid->id;
                    
                    return false; 
                }
            }
        });

        return $gridId;
    }
}