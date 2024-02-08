<?php

namespace App\DTOs\Viper\Department;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\DTO;

class DepartmentRequestDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public CoordinatesRequestDTO $coordinate;
}
