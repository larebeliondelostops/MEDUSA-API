<?php

namespace App\DTOs\Viper\Municipality;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\Location\LocationRequestDTO;

class MunicipalityRequestDTO extends DTO
{
    public ?int $id=null;
    public string $name;
    public CoordinatesRequestDTO $coordinates;
    public int $department_id;
}
