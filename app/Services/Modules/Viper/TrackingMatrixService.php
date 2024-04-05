<?php 

namespace App\Services\Modules\Viper;

use App\Exceptions\Modules\Viper\UndefinedProjectScopeException;
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
            ->with([
                'scope.specificObjectives.products.measurementUnit',
                'scope.specificObjectives.products.deliverables' => function ($query) {
                    $query->whereNull('deliverable_id');
                },
                'scope.specificObjectives.products.deliverables.activities',
                'scope.specificObjectives.products.deliverables.deliverables' => function ($query) {
                    $query->with('activities');
                }
            ])
            ->first();
    
        if ($trackingMatrix && $trackingMatrix->scope && $trackingMatrix->scope->exists()) 
        {
            $trackingMatrix->makeHidden(['bpin']);
            $trackingMatrix->scope->makeHidden(['id', 'project_id']);
            
            foreach($trackingMatrix->scope->specificObjectives as $specific_objective) 
            {
                $specific_objective->makeHidden(['scope_id']);
                
                foreach($specific_objective->products as $product) 
                {
                    $product->makeHidden(['measurement_unit_id', 'specific_objective_id', 'folder_id']);
                    $product->measurementUnit->makeHidden(['id']);
    
                    // Update deliverables number
                    foreach ($product->deliverables as $index => $deliverable) {
                        $deliverable->number = $product->number . '.' . ($index + 1);
    
                        // Update activities numbers
                        foreach ($deliverable->activities as $activityIndex => $activity) {
                            $activity->number = $deliverable->number . '.' . ($activityIndex + 1);
                        }
    
                        // Recursively update numbers for child deliverables and activities
                        $this->updateChildNumbers($deliverable, $deliverable->number);
                    }
                }
            }
            return collect($trackingMatrix);
        } 
        else 
        {
            throw new UndefinedProjectScopeException('No se ha definido un alcance al proyecto '.$projectBpin);
        }
        return collect($trackingMatrix);
    }
    
    private function updateChildNumbers($parentDeliverable, $parentNumber)
    {
        foreach ($parentDeliverable->deliverables as $index => $childDeliverable) {
            $childDeliverable->number = $parentNumber . '.' . ($index + 1);
    
            // Update activities numbers for child deliverable
            foreach ($childDeliverable->activities as $activityIndex => $activity) {
                $activity->number = $childDeliverable->number . '.' . ($activityIndex + 1);
            }
    
            // Recursively update numbers for nested child deliverables and activities
            $this->updateChildNumbers($childDeliverable, $childDeliverable->number);
        }
    }
    
}