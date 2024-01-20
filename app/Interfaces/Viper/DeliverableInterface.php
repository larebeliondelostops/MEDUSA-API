<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Deliverable\DeliverableRequestDTO;

interface DeliverableInterface
{
    public function createNewDeliverable(DeliverableRequestDTO $deliverableRequestDTO) : DeliverableRequestDTO;
    public function getAllDeliverables() : array;
    public function getDeliverablesByProductId(int $productId) : array;
    public function updateDeliverable(string $newName, int $deliverableId) : DeliverableRequestDTO;
    public function deleteDeliverable(int $deliverableId) ;//: DeliverableRequestDTO;
}
