<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ActivityInterface {
    
    public function getAllActivities(int $deliverableId): Collection;

    public function storeActivity(Collection $activity): Collection;

    public function updateActivity(int $activityId, Collection $activity): Collection;

    public function deleteActivity(int $activityId);

    public function getActivity(int $activityId): Collection;

    public function getActivityByProducto(int $productId):Collection;

    public function getActivityByProject(String $projectId):Collection;

    public function getAllActivityByProject(String $projectId):Collection;

    public function updateStateActivityToInProgressByCurrentDate();
}
