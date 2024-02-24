<?php

namespace App\DTOs\Viper\Product;
use App\DTOs\Viper\DTO;

class ProductSummaryWithDeliverablesDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public ?int $number = null;
    public array $deliverables;
}
