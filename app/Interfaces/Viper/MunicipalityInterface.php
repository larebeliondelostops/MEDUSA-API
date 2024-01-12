<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Municipality\MunicipalityDTO;

interface MunicipalityInterface
{
    public function getMunicipalityById(int $id) : MunicipalityDTO;
}
