<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\Location\LocationDetailDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;

interface LocationInterface
{
    public function createNewLocation(LocationRequestDTO $locationRequestDTO) : LocationDetailDTO;
    public function updateLocationById(LocationRequestDTO $locationRequestDTO, int $locationId) : LocationDetailDTO;
    public function getLocationById(int $id) : LocationDetailDTO;
    public function deleteLocationById(int $id) : LocationDetailDTO;
}
