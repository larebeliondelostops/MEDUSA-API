<?php

namespace App\Interfaces\Modules\Viper\Deliverable;

use Illuminate\Support\Collection;

interface DeliverableInterface
{
    public function createNewDeliverable(Collection $deliverableRequestData) : Collection;
    public function createMultipleDeliverables(array $deliverables) : Collection;
    public function getAllDeliverables() : Collection;
    public function getDeliverableWithAllParentsByDeliverableFatherActivityId(int $deliverableFatherActivityId) : array;
    public function getDeliverablesByProductId(int $productId) : Collection;
    public function updateDeliverable(Collection $deliverableData, int $deliverableId) : Collection;

    public function updateDeliverableActivityQuantity(int $id);

    public function deleteDeliverable(int $deliverableId) : Collection;
}
