<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Activity\ActivityDTO;
use App\DTOs\Viper\Deliverable\DeliverableDetailFolderDTO;
use App\DTOs\Viper\Deliverable\DeliverableRequestDTO;

interface DeliverableInterface
{
    public function updateDataWithChildrenActivities(int $deliverableId, ActivityDTO $activityDTO);
    public function createNewDeliverable(DeliverableRequestDTO $deliverableRequestDTO) : DeliverableRequestDTO;
    public function createMultipleDeliverables(array $deliverables) : array;
    public function getAllDeliverables() : array;
    public function getDeliverablesByProductId(int $productId) : array;
    public function updateDeliverable(DeliverableDetailFolderDTO $deliverableDTO, int $deliverableId) : DeliverableDetailFolderDTO;
    public function deleteDeliverable(int $deliverableId) : array;
}
