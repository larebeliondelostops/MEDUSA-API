<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface DeliverableInterface
{
    public function updateIncrementDataWithChildrenActivities(int $deliverableId, Collection $activityData);
    public function updateDecrementDataWithChildrenActivities(int $deliverableId, Collection $activityData);
    public function createNewDeliverable(Collection $deliverableRequestData) : Collection;
    public function createMultipleDeliverables(array $deliverables) : Collection;
    public function getAllDeliverables() : Collection;
    public function getDeliverablesByProductId(int $productId) : Collection;
    public function updateDeliverable(Collection $deliverableData, int $deliverableId) : Collection;
    public function deleteDeliverable(int $deliverableId) : Collection;
}
