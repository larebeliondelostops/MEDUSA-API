<?php 

namespace App\Interfaces\Modules\Viper;
use Illuminate\Support\Collection;
interface TrackingMatrixInterface
{
    public function getTrackingMatrixOfProject(string $projectBpin) : Collection;
}