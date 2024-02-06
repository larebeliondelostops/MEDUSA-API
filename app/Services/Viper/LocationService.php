<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\DTOs\Viper\Location\LocationDetailDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\Interfaces\Viper\CoordinatesInterface;
use App\Interfaces\Viper\LocationInterface;
use App\Models\Viper\Location;

class LocationService implements LocationInterface
{
    private CoordinatesInterface $coordiantesinterface;

    public function __construct( CoordinatesInterface $coordinatesInterface )
    {
        $this->coordiantesinterface = $coordinatesInterface;
    }

    public function createNewLocation(LocationRequestDTO $locationRequestDTO ) : LocationDetailDTO
    {
        $locationRequestDTO->coordinate = $this->coordiantesinterface
                                        ->createNewCoordinates($locationRequestDTO->coordinate);
        $location = new Location(
            $locationRequestDTO->toArray() +
            ['coordinate_id' => $locationRequestDTO->coordinate->id]
        );
        $location->save();
        $location->load('coordinate', 'department', 'municipality');
        return new LocationDetailDTO($location->toArray());
    }

    public function updateLocationById(LocationRequestDTO $locationRequestDTO, int $locationId) : LocationDetailDTO
    {
        $locationGot = Location::with('coordinate',)->findOrFail($locationId);
        $this->coordiantesinterface->updateCoordinatesById(
            $locationRequestDTO->coordinate,
            $locationGot->coordinate->id
        );
        $locationGot->fill($locationRequestDTO->toArray());
        $locationGot->save();
        $locationGot->load('coordinate', 'department', 'municipality');
        return new LocationDetailDTO($locationGot->toArray());
    }

    public function getLocationById(int $id) : LocationDetailDTO
    {
        $location = Location::with('department', 'municipality', 'coordinate')->findOrFail($id);
        return new LocationDetailDTO($location->toArray());
    }

    public function deleteLocationById(int $id) : LocationDetailDTO
    {
        $locationForDeleted = Location::with('department', 'municipality', 'coordinate')->findOrFail($id);
        $locationDeleted = new LocationDetailDTO($locationForDeleted->toArray());
        $locationForDeleted->delete();
        return $locationDeleted;
    }
}
