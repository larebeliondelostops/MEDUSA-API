<?php 

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ProjectMunicipalityInterface
{
    public function getProjectMunicipality(int $projectMunicipalityId) : Collection;
    public function getSoftDeletedProjectMunicipality(string $bpin, int $municipalityId) : Collection;
    public function restoreSoftDeletedProjectMunicipality(int $municipalityId) : Collection;
    public function createProjectMunicipality(Collection $projectMunicipality) : Collection;
    public function getAllProjectMunicipalities(array $queryParams = []) : Collection;
    public function deleteProjectMunicipality(int $projectMunicipalityId) : Collection;
}