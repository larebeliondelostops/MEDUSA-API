<?php

namespace App\Interfaces\Viper;
use App\DTOs\Viper\Municipality\MunicipalityDTO;

interface MunicipalityInterface
{
    public function createNewMunicipality(MunicipalityDTO $municipality): MunicipalityDTO;
    public function getAllMunicipalities() : array;
    public function getMunicipalityById(int $id) : MunicipalityDTO;
    public function updateMunicipality(MunicipalityDTO $municipalityDTO, int $id): MunicipalityDTO;
    public function deleteMunicipality(int $id) : MunicipalityDTO;

}
