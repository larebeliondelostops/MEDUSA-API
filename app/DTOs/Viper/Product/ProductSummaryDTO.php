<?php

namespace App\DTOs\Viper\Product;
use App\DTOs\Viper\DTO;

class ProductSummaryDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public ?int $number = null;
}
