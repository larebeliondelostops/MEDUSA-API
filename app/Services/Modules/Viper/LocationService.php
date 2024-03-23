<?php

namespace App\Services\Modules\Viper;

use App\DTOs\Viper\Location\LocationDetailDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\Interfaces\Modules\Viper\CoordinatesInterface;
use App\Interfaces\Modules\Viper\LocationInterface;
use App\Models\Modules\Viper\Location;
use Illuminate\Support\Collection;

class LocationService implements LocationInterface
{
    private CoordinatesInterface $coordiantesinterface;

    public function __construct( CoordinatesInterface $coordinatesInterface )
    {
        $this->coordiantesinterface = $coordinatesInterface;
    }

    public function createNewLocation(Collection $locationRequestDTO ) : Collection
    {
        $locationRequestDTO['coordinate'] = $this->coordiantesinterface
                                        ->createNewCoordinates(collect($locationRequestDTO['coordinate']));
        $location = new Location(
            $locationRequestDTO->toArray() +
            ['coordinate_id' => $locationRequestDTO['coordinate']['id']]
        );
        $location->save();
        return $this->getLocationById($location->id);
    }

    public function updateLocationById(Collection $locationRequestDTO, int $locationId) : Collection
    {
        $locationGot = Location::with('coordinate',)->findOrFail($locationId);
        $this->coordiantesinterface->updateCoordinatesById(
            collect($locationRequestDTO['coordinate']),
            $locationGot->coordinate->id
        );
        $locationGot->fill($locationRequestDTO->toArray());
        $locationGot->save();
        return $this->getLocationById($locationGot->id);
    }

    public function getLocationById(int $id) : Collection
    {
        $location = Location::with('department', 'municipality', 'coordinate')->findOrFail($id);
        return collect($location->toArray());
    }

    public function deleteLocationById(int $id) : Collection
    {
        $locationForDeleted = Location::with('department', 'municipality', 'coordinate')->findOrFail($id);
        $locationDeleted = collect($locationForDeleted->toArray());
        $locationForDeleted->delete();
        return $locationDeleted;
    }
}
