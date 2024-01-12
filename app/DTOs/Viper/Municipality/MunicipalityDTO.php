<?php

namespace App\DTOs\Viper\Municipality;
use App\DTOs\Viper\DTO;

class MunicipalityDTO extends DTO
{
    public int $id;
    public string $name;
    public string $type_location;
    public float $latitude;
    public float $longitude;
    public int $department_id;
}
