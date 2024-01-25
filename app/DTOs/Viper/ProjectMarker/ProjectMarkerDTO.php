<?php

namespace App\DTOs\Viper\ProjectMarker;
use App\DTOs\Viper\DTO;

class ProjectMarkerDTO extends DTO
{
    public int $markerType;
    public string $id;
    public GeometryDTO $geometry;
}
