<?php

namespace App\Interfaces\Modules\Viper;
use Illuminate\Support\Collection;

interface CoordinatesInterface
{
    public function createNewCoordinates(Collection $coordinatestDTO) : Collection;
    public function updateCoordinatesById(Collection $coordinatesDTO, string $id ) : Collection;
    public function getCoordinatesById(string $id) : Collection;
    public function deleteCoordinates(string $id) : Collection;

}
