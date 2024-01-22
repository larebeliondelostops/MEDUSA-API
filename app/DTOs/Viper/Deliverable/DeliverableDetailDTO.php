<?php

namespace App\DTOs\Viper\Deliverable;
use App\DTOs\Viper\DTO;

class DeliverableDetailDTO extends DTO
{
    public ?int $id = null;
    public ?string $number = null;
    public string $name;
    public int $activity_quantity = 0;
    public float $value = 0.0;
    public int $product_id;
    public ?int $deliverable_id = null;
    public array $child_deliverables = [];
}
