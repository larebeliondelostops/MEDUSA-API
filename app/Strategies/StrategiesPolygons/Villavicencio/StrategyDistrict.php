<?php

namespace App\Strategies\StrategiesPolygons\Villavicencio;

use App\Models\Villavicencio\district;
use App\Interfaces\Markers\PolygonsInterface;

class StrategyDistrict implements PolygonsInterface
{
    public function __construct(
        private District $model
    ) {}

    public function getModel() : District
    {
        return $this->model;
    }

    /**
     * Metodo para obtener todos los poligonos de las comunas con sus barrios
     *
     * @return array
     */
    public function allPolygons()
    {

        $districts = District::with('neighborhoods')->get();
       
        $districtsOrganized = $districts->map(function ($district) {
            return [
                'markerType' => 58,
                'id' => $district->id, 
                'title' => $district->name,
                'properties' => [
                    // 'uuid' => $district->uuid,
                    // 'neighborhoods' => $district->neighborhoods->map(function ($neighborhood) {
                    //     return [
                    //         'id' => $neighborhood->id,
                    //         'name' => $neighborhood->name,
                    //     ];
                    // }),
                    // 'createdAt' => $district->created_at,
                    // 'updatedAt' => $district->updated_at,
                ],
                'position' => json_decode($district->coordinates), 
            ];
        });

        return $districtsOrganized->toArray();
    }

}
