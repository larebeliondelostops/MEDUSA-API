<?php

namespace App\DTOs\Viper\ProjectMarker;
use App\DTOs\Viper\DTO;

class ProjectMarkerPointDTO extends DTO
{
    public int $markerType = 100;
    public string $id;
    public GeometryDTO $geometry;
}
