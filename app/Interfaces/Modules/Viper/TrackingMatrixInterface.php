<?php 

namespace App\Interfaces\Modules\Viper;
interface TrackingMatrixInterface
{
    public function getTrackingMatrixOfProject(string $projectBpin) : TrackingMatrixDetailDTO;
}