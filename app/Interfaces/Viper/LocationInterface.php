<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Location\LocationRequestDTO;

interface LocationInterface
{
    public function createNewInterface(LocationRequestDTO $locationRequestDTO) : LocationRequestDTO;
    public function getLocationById(string $id) : LocationRequestDTO;
    public function deleteLocation(string $id) : LocationRequestDTO;

}
