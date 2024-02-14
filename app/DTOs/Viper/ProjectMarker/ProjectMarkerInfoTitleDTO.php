<?php

namespace App\DTOs\Viper\ProjectMarker;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\State\StateDTO;
use App\DTOs\Viper\Substate\SubstateDTO;

class ProjectMarkerInfoTitleDTO extends DTO
{
    public string $bpin;                     // Identificador único del proyecto
}
