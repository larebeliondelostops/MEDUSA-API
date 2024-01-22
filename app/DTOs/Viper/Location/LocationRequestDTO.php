<?php

namespace App\DTOs\Viper\Location;
use App\DTOs\Viper\DTO;

class LocationRequestDTO extends DTO
{
    public ?string $id = null;
    public string $type;
    public float $latitude;
    public float $longitude;
}
