<?php

namespace App\DTOs\Viper\Municipality;
use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\DTO;

class MunicipalityDetailDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public CoordinatesRequestDTO $coordinate;
    public DepartmentRequestDTO $department;
}
