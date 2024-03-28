<?php

namespace App\Interfaces\Modules\Viper\Deliverable;
use Illuminate\Support\Collection;

interface DeliverableEventActivityInterface
{
    public function updateIncrementDataWithChildrenActivities(int $deliverableId, array $activityData, array &$deliverablesData, array &$result);
    public function updateDecrementDataWithChildrenActivities(?array $previousDeliverable, array $activityData, array &$deliverablesData, array &$result);
}