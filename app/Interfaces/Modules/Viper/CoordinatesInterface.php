<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Coordinates\CoordinatesRequestDTO;

interface CoordinatesInterface
{
    public function createNewCoordinates(CoordinatesRequestDTO $coordinatestDTO) : CoordinatesRequestDTO;
    public function updateCoordinatesById(CoordinatesRequestDTO $coordinatesDTO, string $id ) : CoordinatesRequestDTO;
    public function getCoordinatesById(string $id) : CoordinatesRequestDTO;
    public function deleteCoordinates(string $id) : CoordinatesRequestDTO;

}
