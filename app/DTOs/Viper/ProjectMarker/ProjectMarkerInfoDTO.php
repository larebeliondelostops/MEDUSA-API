<?php

namespace App\DTOs\Viper\ProjectMarker;
use App\DTOs\Viper\DTO;
use App\DTOs\Viper\State\StateDTO;
use App\DTOs\Viper\Substate\SubstateDTO;

class ProjectMarkerInfoDTO extends DTO
{
    public ProjectMarkerInfoTitleDTO $title;
    public ProjectMarkerInfoPropertiesDTO $properties;
}
