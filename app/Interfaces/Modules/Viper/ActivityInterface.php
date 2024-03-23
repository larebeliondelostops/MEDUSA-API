<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Activity\ActivityDTO;
use Illuminate\Support\Collection;

interface ActivityInterface {
    
    public function getAllActivities(int $deliverableId): Collection;

    public function storeActivity(Collection $activity): Collection;

    public function updateActivity(int $activityId, Collection $activity): Collection;

    public function deleteActivity(int $activityId);

    public function getActivity(int $activityId): Collection;
}
