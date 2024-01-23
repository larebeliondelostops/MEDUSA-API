<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\Interfaces\Viper\LocationInterface;
use App\Models\Viper\Location;
use Ramsey\Uuid\Uuid;

class LocationService implements LocationInterface
{
    public function createNewLocation(LocationRequestDTO $locationDTO) : LocationRequestDTO
    {
        $locationDTO->id = Uuid::uuid4()->toString();
        $location = new Location($locationDTO->toArray());
        $location->save();
        $locationSavedDTO = new LocationRequestDTO($location->toArray());
        return $locationSavedDTO;
    }

    public function updateLocationById(LocationRequestDTO $locationDTO, string $id) : LocationRequestDTO
    {
        $location = Location::findOrFail($id);
        $location->fill($locationDTO->toArray(except:['id']));
        $location->save();
        $locationUpdatedDTO = new LocationRequestDTO($location->toArray());
        return $locationUpdatedDTO;
    }

    public function getLocationById(string $id) : LocationRequestDTO
    {
        $location = Location::findOrFail($id);
        $locationGotDTO = new LocationRequestDTO($location->toArray());
        return $locationGotDTO;
    }

    public function deleteLocation(string $id) : LocationRequestDTO
    {
        $location = Location::findOrFail($id);
        $locationDeletedDTO = new LocationRequestDTO($location->toArray());
        $location->delete();
        return $locationDeletedDTO;
    }
}
