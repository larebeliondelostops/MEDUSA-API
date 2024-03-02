<?php

namespace App\Http\Controllers\Viper\Strategies;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\ProjectMarker\ProjectMarkerPointDTO;
use App\Models\Viper\Coordinates;
use App\Models\Viper\Location;
use App\Models\Viper\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Exception;

class StrategyProjectMarker
{
    public static function all()
    {
        $projectMarkets = [];
        $projectsGot = Project::with('locations', 'locations.coordinate')->get();

        foreach($projectsGot as $project)
        {
            foreach($project->locations as $location)
            {
                $coordinatesDTO = new CoordinatesRequestDTO($location->coordinate->toArray());
                $projectMarket = new ProjectMarkerPointDTO(
                    [
                        'id' => $coordinatesDTO->id,
                        'geometry' => [
                                'type' => $coordinatesDTO->type,
                                'coordinates' => [
                                    (float)$coordinatesDTO->latitude,
                                    (float)$coordinatesDTO->longitude
                                ]
                        ]
                    ]
                );
                array_push($projectMarkets, $projectMarket);
            }
        }

        return response()->json($projectMarkets);
    }

    public static function getInfoPoint($uuid)
    {

        $coordinate = Coordinates::with('location', 'location.project', )->findOrFail($uuid);

        try {
            $projectInfo = [
                'title' => $coordinate->location->project->name,
                'properties' => [
                    'bpin' => $coordinate->location->project->bpin,
                    'sector' => $coordinate->location->project->sector->name,
                    'estado' => $coordinate->location->project->state->name,
                    'subestado' => $coordinate->location->project->substate->name,
                    'entidad ejecutora' => $coordinate->location->project->responsible_entity,
                    'valor requerido' => $coordinate->location->project->requested_valued,
                    'valor ejecutado' => $coordinate->location->project->executed_value,
                    'fecha de aprobación' => $coordinate->location->project->execution_approval_date,
                    'fecha de finalización' => $coordinate->location->project->completion_date,
                    'fecha de ejecución' => $coordinate->location->project->start_date_execution_phase
                ]
            ];

            return response()->json($projectInfo, 200, [], JSON_PRETTY_PRINT);
        } catch (Exception $exception) {
            Log::error($exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            return Response::json([
                'code' => '1001',
                'status' => 'error',
                'message' => 'Error En La Generación De La Solicitud'.$exception->getMessage()
            ], 500, [], JSON_PRETTY_PRINT);
        }
    }

    public function allTable(Request $request)
    {
        return response()->json([]);
    }

    public function getOne($id)
    {
        return response()->json([]);
    }

    public function store(Request $request)
    {
        return response()->json([]);
    }

    public function update(Request $request, $id)
    {
        return response()->json([]);
    }

    public function destroy($id)
    {
        return response()->json([]);
    }

    public function storeMax(Request $request)
    {
        return response()->json([]);
    }
}
