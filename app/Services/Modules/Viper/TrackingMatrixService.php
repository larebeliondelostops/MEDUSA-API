<?php 

namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\TrackingMatrixInterface;
use App\Models\Modules\Viper\Project;
use App\Models\Modules\Viper\Scope;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TrackingMatrixService implements TrackingMatrixInterface
{
    public function getTrackingMatrixOfProject(string $projectBpin) : Collection
    {
        $trackingMatrix = Project::join('scopes','scopes.project_id','=', 'projects.bpin')
        ->join('specific_objectives','specific_objectives.scope_id','=','scopes.id')
        ->select(['projects.bpin','projects.name'])
        ->where('projects.bpin', $projectBpin)
        ->with(['scope.specificObjectives.products.measurementUnit',
            'scope.specificObjectives.products.deliverables' => function ($query) {
                $query->whereNull('deliverable_id');
            },
            'scope.specificObjectives.products.reports',
            'scope.specificObjectives.products.reports.proofs',
            'scope.specificObjectives.products.deliverables.activities',
            'scope.specificObjectives.products.deliverables.deliverables',
            
        ])
        ->first();

        if ($trackingMatrix && $trackingMatrix->scope && $trackingMatrix->scope->exists()) 
        {
            $trackingMatrix->makeHidden(['bpin',]);
            $trackingMatrix->scope->makeHidden(['id', 'project_id']);
            foreach($trackingMatrix->scope->specificObjectives as $specific_objective) 
            {
                $specific_objective->makeHidden(['scope_id']);
                foreach($specific_objective->products as $product) 
                {
                    $product->makeHidden(['measurement_unit_id', 'specific_objective_id', 'folder_id']);
                    $product->measurementUnit->makeHidden(['id']);
                }
            }
            return collect($trackingMatrix);
        } 
        else 
        {
            throw (new ModelNotFoundException('Scope sin definir para el proyecto '.$projectBpin))->setModel(Scope::class);
        }
        return collect($trackingMatrix);
    }
}