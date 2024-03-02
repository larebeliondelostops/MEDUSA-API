<?php

namespace App\DTOs\Viper\Deliverable;
use App\DTOs\Viper\DTO;

class DeliverablesRequestDTO extends DTO
{
    public ?int $id = null;
    public int $number;
    public string $name;
    public int $activity_quantity = 0;
    public float $value = 0.0;
    public int $product_id;
    public array $deliverables = []; // debe ser tipo DeliverablesRequestDTO
    public ?int $folder_id = null;
}
