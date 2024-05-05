<?php

namespace App\Strategies\StrategiesPoints\Viper;

use App\Models\Modules\Viper\Project;
use App\Models\Modules\Viper\Coordinates;
use App\Interfaces\Markers\PointsInterface;

class StrategyProjectMarker implements PointsInterface
{
    public function __construct(
        private Project $model
    ) {}

    public function getModel() : Project
    {
        return $this->model;
    }

    /* public function allPoints()
    {
        return $this->getModel()->allPoints();
    } */

    public function allPoints()
    {
        $projectMarkets = [];
        $projectsGot = Project::with('locations', 'locations.coordinate')->get();

        foreach($projectsGot as $project)
        {
            foreach($project->locations as $location)
            {
                $coordinates = $location->coordinate;
                $projectMarket = [
                    'markerType' => 1,
                    'id' => $coordinates->id,
                    'geometry' => [
                            'type' => $coordinates->type,
                            'coordinates' => [
                                (float)$coordinates->latitude,
                                (float)$coordinates->longitude
                            ]
                    ]
                            ];
                array_push($projectMarkets, $projectMarket);
            }
        }

        return collect($projectMarkets);
    }

    public function getInfoPoint($uuid)
    {
        $coordinate = Coordinates::with('location', 'location.project', )->findOrFail($uuid);
        
        $projectInfo = [
            'title' => $coordinate->location->project->name,
            'properties' => [
                'bpin' => $coordinate->location->project->bpin,
                'sector' => $coordinate->location->project->sector->name,
                'estado' => $coordinate->location->project->state->name,
                'subestado' => $coordinate->location->project->substate->name,
                'entidad ejecutora' => $coordinate->location->project->responsible_entity,
                'valor requerido' => $coordinate->location->project->requested_value,
                'valor ejecutado' => $coordinate->location->project->executed_value,
                'fecha de aprobación' => $coordinate->location->project->execution_approval_date,
                'fecha de finalización' => $coordinate->location->project->completion_date,
                'fecha de ejecución' => $coordinate->location->project->start_date_execution_phase
            ]
        ];

        return $projectInfo;
    }
}
