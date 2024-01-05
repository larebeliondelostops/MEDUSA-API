<?php

namespace App\DTOs\Viper;

use App\DTOs\Viper\DTO;

class ProjectSummaryDTO extends DTO
{
    public string $bpin;
    public string $name;
    public string $state;
}