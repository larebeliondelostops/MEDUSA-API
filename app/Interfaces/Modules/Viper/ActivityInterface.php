<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Activity\ActivityDTO;

interface ActivityInterface {
    
    public function getAllActivities(int $deliverableId);

    public function storeActivity(ActivityDTO $activityDTO);

    public function updateActivity($activityId, ActivityDTO $activityDTO);

    public function deleteActivity($activityId);

    public function getActivity($activityId);
}
