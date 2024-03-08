<?php 

namespace App\Interfaces\Viper;
use App\DTOs\Viper\TrackingMatrix\TrackingMatrixDetailDTO;

interface TrackingMatrixInterface
{
    public function getTrackingMatrixOfProject(string $projectBpin) : TrackingMatrixDetailDTO;
}