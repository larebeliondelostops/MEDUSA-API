<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Deliverable\DeliverableDetailDTO;
use App\DTOs\Viper\Deliverable\DeliverableRequestDTO;
use App\DTOs\Viper\Deliverable\DeliverablesRequestDTO;
use App\Interfaces\Viper\DeliverableInterface;

class DeliverableService implements DeliverableInterface
{
    public function createNewDeliverable(DeliverableRequestDTO $deliverableRequestDTO, int  $projectId) : DeliverableRequestDTO
    {

    }

    public function createMultipleDeliverables(array $deliverablesDTO) : array
    {

        return $deliverablesDTO;
    }

    public function getAllDeliverables() : array
    {

    }

    public function getDeliverablesByProductId(int $productId) : array
    {

    }

    public function updateDeliverable(string $name, int $deliverableId) : DeliverableRequestDTO
    {

    }

    public function deleteDeliverable(int $deliverableId) : DeliverableDetailDTO
    {

    }
}
