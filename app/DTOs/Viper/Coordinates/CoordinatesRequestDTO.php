<?php

namespace App\DTOs\Viper\Coordinates;
use App\DTOs\Viper\DTO;

class CoordinatesRequestDTO extends DTO
{
    public ?string $id = null;
    public string $type;
    public float $latitude;
    public float $longitude;
}
