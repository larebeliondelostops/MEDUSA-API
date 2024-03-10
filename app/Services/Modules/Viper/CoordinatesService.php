<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;
use App\Interfaces\Viper\CoordinatesInterface;
use App\Models\Viper\Coordinates;
use Ramsey\Uuid\Uuid;

class CoordinatesService implements CoordinatesInterface
{
    public function createNewCoordinates(CoordinatesRequestDTO $coordinatesDTO) : CoordinatesRequestDTO
    {
        $coordinatesDTO->id = Uuid::uuid4()->toString();
        $coordinates = new Coordinates($coordinatesDTO->toArray());
        $coordinates->save();
        $coordinatesSavedDTO = new CoordinatesRequestDTO($coordinates->toArray());
        return $coordinatesSavedDTO;
    }

    public function updateCoordinatesById(CoordinatesRequestDTO $coordinatesDTO, string $id) : CoordinatesRequestDTO
    {
        $coordinates = Coordinates::findOrFail($id);
        $coordinates->fill($coordinatesDTO->toArray(except:['id']));
        $coordinates->save();
        $coordinatesUpdatedDTO = new CoordinatesRequestDTO($coordinates->toArray());
        return $coordinatesUpdatedDTO;
    }

    public function getCoordinatesById(string $id) : CoordinatesRequestDTO
    {
        $coordinates = Coordinates::findOrFail($id);
        $coordinatesGotDTO = new CoordinatesRequestDTO($coordinates->toArray());
        return $coordinatesGotDTO;
    }

    public function deleteCoordinates(string $id) : CoordinatesRequestDTO
    {
        $coordinates = Coordinates::findOrFail($id);
        $coordinatesDeletedDTO = new CoordinatesRequestDTO($coordinates->toArray());
        $coordinates->delete();
        return $coordinatesDeletedDTO;
    }
}
