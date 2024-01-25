<?php

namespace App\DTOs\Viper\Department;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\Location\LocationRequestDTO;

class DepartmentRequestDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public LocationRequestDTO $location;
}
