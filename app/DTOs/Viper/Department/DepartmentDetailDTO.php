<?php

namespace App\DTOs\Viper\Department;
use App\DTOs\Viper\DTO;

class DepartmentDetailDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public string $type_location;
    public float $latitude;
    public float $longitude;
    public array $municipalities;
}
