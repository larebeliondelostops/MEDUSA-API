<?php

namespace App\Services\Modules\Viper;

use App\Interfaces\Modules\Viper\ProjectMunicipalityInterface;
use App\Models\Modules\Viper\Project;
use App\Models\Modules\Viper\ProjectMunicipality;
use App\Utils\Filters\Modules\Viper\ProjectMunicipalityFilter;
use Illuminate\Support\Collection;

/**
 * Servicio para manejar operaciones relacionadas con la relación de proyecto-municipio.
 *
 * Este servicio implementa la interfaz ProjectMunicipalityInterface y es responsable
 * de implementar las operaciones como la creación, actualización, recuperación
 * y eliminación de relaciones de proyecto-municipio.
 * @package    App\Service\Modules\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ProjectMunicipalityService implements ProjectMunicipalityInterface
{
    public function getProjectMunicipality(int $projectMunicipalityId) : Collection
    {
        $projectMunicipality = ProjectMunicipality::findOrFail($projectMunicipalityId);
        return collect($projectMunicipality);
    }

    public function createProjectMunicipality(Collection $projectMunicipality) : Collection
    {
        $projectMunicipality = ProjectMunicipality::create($projectMunicipality->toArray());
        return collect($projectMunicipality);
    }

    /**
     * Obtiene todas las relaciones de proyecto-municipio que coinciden con los parámetros de consulta proporcionados.
     *
     * @param array $queryparam Parámetros de consulta para filtrar las relaciones de proyecto-municipio.
     * @return Illuminate\Support\Collection Colección de relaciones de proyecto-municipio.
     */
    public function getAllProjectMunicipalities(array $queryparam = []) : Collection
    {   
        // Instancia del filtro para transformar los parámetros de consulta
        $filter = new ProjectMunicipalityFilter();
        $queryItems = $filter->transform($queryparam);

        // Construir la consulta de relaciones de proyecto-municipio
        $projectMunicipalityQuery = ProjectMunicipality::query();
        foreach($queryItems as $item)
        {
            $projectMunicipalityQuery->orWhere(...$item);
        }

        // Obtener y devolver las relaciones de proyecto-municipio como una colección
        return collect($projectMunicipalityQuery->get());
    }

    /**
     * Obtiene una entrada de municipio previamente eliminada suavemente.
     *
     * @param string $bpin El BPIN (Business Project Identification Number) del proyecto.
     * @param int $municipalityId El ID del municipio.
     * @return Collection|null La colección que contiene la instancia de ProjectMunicipality si se encuentra, o null si no se encuentra.
     */
    public function getSoftDeletedProjectMunicipality($bpin, $municipalityId) : Collection
    {
        // Busca una entrada en la tabla de projectMunicipalities que coincida con el BPIN y el ID del municipio,
        // y que además haya sido eliminada suavemente.
        // Retorna la primera instancia encontrada, o null si no se encuentra ninguna.
        return collect(ProjectMunicipality::where('project_bpin', $bpin)
            ->where('municipality_id', $municipalityId)
            ->onlyTrashed() // Esto filtra solo las entradas eliminadas suavemente
            ->get());
    }
    
    /**
     * Restaura una entrada de municipio previamente eliminada suavemente.
     *
     * @param int $municipalityId El ID de la entrada de municipio a restaurar.
     * @return Collection La colección que contiene la instancia de ProjectMunicipality restaurada.
     */
    public function restoreSoftDeletedProjectMunicipality(int $municipalityId) : Collection
    {
        // Encuentra la entrada eliminada suavemente por su ID
        $restoredMunicipality = ProjectMunicipality::onlyTrashed()->find($municipalityId);

        // Si se encuentra la entrada, la restaura
        if ($restoredMunicipality) {
            $restoredMunicipality->restore();
        }

        // Retorna una colección que contiene la instancia de ProjectMunicipality restaurada, o una colección vacía si no se encontró ninguna
        return collect($restoredMunicipality);
    }

    public function deleteProjectMunicipality(int $projectMunicipalityId) : Collection
    {
        $projectMunicipality = ProjectMunicipality::findOrFail($projectMunicipalityId);
        $projectMunicipality->delete();
        return collect($projectMunicipality);
    }
    
}