<?php

namespace App\DTOs\Viper\State;
use App\DTOs\Viper\DTO;

class StateDetailDTO extends DTO
{
    public ?int $id = null;
    public string $name;
    public array $substates;
}
