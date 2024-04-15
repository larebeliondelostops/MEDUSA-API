<?php

namespace App\Services\Modules\Viper;
use App\Interfaces\Modules\Viper\CoordinatesInterface;
use App\Models\Modules\Viper\Coordinates;
use Illuminate\Support\Collection;
use Ramsey\Uuid\Uuid;

class CoordinatesService implements CoordinatesInterface
{
    public function createNewCoordinates(Collection $coordinatesData) : Collection
    {
        $coordinatesData['id'] = Uuid::uuid4()->toString();
        $coordinates = new Coordinates($coordinatesData->toArray());
        $coordinates->save();
        return collect($coordinates);
    }

    public function updateCoordinatesById(Collection $coordinatesDTO, string $id) : Collection
    {
        $coordinates = Coordinates::findOrFail($id);
        $coordinates->fill($coordinatesDTO->toArray());
        $coordinates->save();
        return collect($coordinates);
    }

    public function getCoordinatesById(string $id) : Collection
    {
        $coordinates = Coordinates::findOrFail($id);
        return collect($coordinates);
    }

    public function deleteCoordinates(string $id) : Collection
    {
        $coordinates = Coordinates::findOrFail($id);
        $coordinatesDeleted = collect($coordinates);
        $coordinates->delete();
        return $coordinatesDeleted;
    }
}
