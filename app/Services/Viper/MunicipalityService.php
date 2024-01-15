<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Interfaces\Viper\MunicipalityInterface;
use App\Models\Viper\Municipality;

class MunicipalityService implements MunicipalityInterface
{
    public function createNewMunicipality(MunicipalityDTO $municipalityDTO) : MunicipalityDTO
    {
        $newMunicipality = new Municipality($municipalityDTO->toArray(except: ["id"]));
        $newMunicipality->save();
        return new MunicipalityDTO($newMunicipality->toArray());
    }

    public function getAllMunicipalities() : array
    {
        $municipalitiesGOT = Municipality::all();
        $municipalitiesDTO = $municipalitiesGOT->transform(
            function (Municipality $municipality)
            {
                return new MunicipalityDTO($municipality->toArray());
            }
        )->toArray();
        return $municipalitiesDTO;
    }

    public function getMunicipalityById(int $id) : MunicipalityDTO
    {
        $municipalityGot = Municipality::findOrFail($id);
        $municipalityDTO = new MunicipalityDTO($municipalityGot->toArray());
        return $municipalityDTO;
    }

    public function updateMunicipality(MunicipalityDTO $municipalityDTO, int $id) : MunicipalityDTO
    {
        $municipalityGot = Municipality::findOrFail($id);
        $municipalityGot->fill($municipalityDTO->toArray());
        $municipalityGot->save();
        return new MunicipalityDTO($municipalityGot->toArray());
    }

    public function deleteMunicipality($id) : MunicipalityDTO
    {
        $municipalityGot = Municipality::findOrFail($id);
        $municipalityDelete = new MunicipalityDTO($municipalityGot->toArray());
        $municipalityGot->delete();
        return $municipalityDelete;
    }
}
