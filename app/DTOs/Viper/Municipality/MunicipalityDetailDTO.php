<?php

namespace App\DTOs\Viper\Municipality;
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\Location\LocationRequestDTO;

class MunicipalityDetailDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public LocationRequestDTO $location;
    public DepartmentRequestDTO $department;
}
