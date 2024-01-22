<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\Interfaces\Viper\LocationInterface;
use App\Models\Viper\Location;

class LocationService implements LocationInterface
{
    public function createNewInterface(LocationRequestDTO $locationDTO) : LocationRequestDTO
    {
        $location = new Location($locationDTO->toArray());
        $location->save();

        return new LocationRequestDTO($location->toArray());
    }

    public function getLocationById(string $id) : LocationRequestDTO
    {
        $location = Location::findOrFail($id);
        return new LocationRequestDTO($location->toArray());
    }
}
