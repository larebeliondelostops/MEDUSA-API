<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Location\LocationRequestDTO;

interface LocationInterface
{
    public function createNewLocation(LocationRequestDTO $locationtDTO) : LocationRequestDTO;
    public function updateLocationById(LocationRequestDTO $locationDTO, string $id ) : LocationRequestDTO;
    public function getLocationById(string $id) : LocationRequestDTO;
    public function deleteLocation(string $id) : LocationRequestDTO;

}
