<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Interfaces\Viper\MunicipalityInterface;
use App\Models\Viper\Municipality;
use App\Utils\Viper\Filters\MunicipalityFilter;

class MunicipalityService implements MunicipalityInterface
{
    public function createNewMunicipality(MunicipalityDTO $municipalityDTO) : MunicipalityDTO
    {
        $newMunicipality = new Municipality($municipalityDTO->toArray(except: ["id"]));
        $newMunicipality->save();
        return new MunicipalityDTO($newMunicipality->toArray());
    }

    public function getAllMunicipalities(array $queryFilterParams = []) : array
    {
        $filter = new MunicipalityFilter();
        $queryItems = $filter->transform($queryFilterParams);

        $municipalityQuery = Municipality::query();
        foreach($queryItems as $item) {
            if(count($item) === 3) {
                $municipalityQuery->orWhere($item[0], $item[1], $item[2]);
            }
        }

        $municipalitiesDTO = $municipalityQuery->get()->transform(
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
