<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Interfaces\Viper\MunicipalityInterface;
use App\Models\Viper\Municipality;

class MunicipalityService implements MunicipalityInterface
{
    public function getMunicipalityById(int $id) : MunicipalityDTO
    {
        $municipality = Municipality::find($id);
        return new MunicipalityDTO($municipality->toArray());
    }
}
