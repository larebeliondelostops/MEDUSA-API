<?php

namespace App\DTOs\Viper\State;
use App\DTOs\Viper\DTO;

class StateDTO extends DTO
{
    public ?int $id = null;
    public string $name;
}
