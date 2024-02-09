<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Deliverable\DeliverableDetailFolderDTO;
use App\DTOs\Viper\Deliverable\DeliverableRequestDTO;

interface DeliverableInterface
{
    public function createNewDeliverable(DeliverableRequestDTO $deliverableRequestDTO) : DeliverableRequestDTO;
    public function createMultipleDeliverables(array $deliverables) : array;
    public function getAllDeliverables() : array;
    public function getDeliverablesByScopeId(int $scopeId) : array;
    public function updateDeliverable(DeliverableDetailFolderDTO $deliverableDTO, int $deliverableId) : DeliverableDetailFolderDTO;
    public function deleteDeliverable(int $deliverableId) : array;
}
