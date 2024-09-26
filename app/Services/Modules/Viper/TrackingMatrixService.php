<?php 

namespace App\Services\Modules\Viper;

use App\Exceptions\Modules\Viper\UndefinedProjectScopeException;
use App\Interfaces\Modules\Viper\TrackingMatrixInterface;
use App\Models\Modules\Viper\Project;
use Illuminate\Support\Collection;

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
            ])
            ->first();
        $trackingMatrix->scope->specificObjectives->each(function($objective) {
            $objective->products->each(function($product) {
                $this->loadDeliverablesActivities($product->deliverables);
            });
        });
        $trackingMatrixData = $trackingMatrix->toArray(); 
        //return collect($trackingMatrixData);
        if ($trackingMatrix && $trackingMatrix->scope && $trackingMatrix->scope->exists()) 
        {    
            foreach($trackingMatrixData['scope']['specific_objectives'] as &$specific_objective) 
            { 
                foreach($specific_objective['products'] as &$product) 
                {
                    $product['measurement_unit'] = $product['measurement_unit']['name'];
                    
                    foreach ($product['deliverables'] as &$deliverable)
                    {
                        $deliverable['number'] = $product['number'] . '.' . $deliverable['number'];
                        foreach ($deliverable['activities'] as &$activity) 
                        {
                            $activity['number'] = $deliverable['number'] . '.' . $activity['number'];
                            $activity['measurement_unit'] = $activity['measurement_unit']['name'];
                        }

                        if($deliverable['deliverables']!=[])
                            $this->updateChildNumbers($deliverable['deliverables'], $deliverable['number']);
                    }
                }
            }
            return collect($trackingMatrixData);
        } 
        else 
        {
            throw new UndefinedProjectScopeException('No se ha definido un alcance al proyecto '.$projectBpin);
        }
        return collect($trackingMatrixData);
    }

    
    private function updateChildNumbers(array &$deliverables, string $parentNumber)
    {
        foreach ($deliverables as  &$deliverable)
        {
            $deliverable['number'] = $parentNumber . '.' . $deliverable['number'];

            // Update activities numbers for child deliverable
            foreach ($deliverable['activities'] as &$activity) {
                $activity['number'] = $deliverable['number'] . '.' . $activity['number'];
                $activity['measurement_unit'] = $activity['measurement_unit']['name'];
            }

            // Recursively update numbers for nested child deliverables and activities
            $this->updateChildNumbers($deliverable['deliverables'], $deliverable['number']);
        }
    } 
    
    function loadDeliverablesActivities($deliverables) {
        $deliverables->each(function($deliverable) {
            $deliverable->activities->each(function($activity) {
                $activity->load('measurementUnit', 'progresses.proofs.document');
            });
    
            if ($deliverable->deliverables->isNotEmpty()) {
                $this->loadDeliverablesActivities($deliverable->deliverables);
            }
        });
    }
}