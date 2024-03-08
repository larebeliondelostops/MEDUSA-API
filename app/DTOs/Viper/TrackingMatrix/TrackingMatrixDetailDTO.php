<?php

namespace App\DTOs\Viper\TrackingMatrix;
use App\DTOs\Viper\DTO;

class TrackingMatrixDetailDTO extends DTO
{
    public string $projectBpin;
    public string $projectName;
    public array $specificObjectives;
}