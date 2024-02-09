<?php

namespace App\DTOs\Viper\Department;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\Location\LocationRequestDTO;

class DepartmentDetailDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public LocationRequestDTO $location;
    public array $municipalities;
}
