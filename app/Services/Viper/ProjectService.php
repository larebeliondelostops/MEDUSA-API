<?php

namespace App\Services\Viper;

// Librerias del modulo viper
use App\DTOs\Viper\Department\DepartmentDTO;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\DTOs\Viper\Project\ProjectDataDTO;
use App\DTOs\Viper\Project\ProjectRequestDTO;
use App\DTOs\Viper\Project\ProjectSummaryDTO;
use App\DTOs\Viper\Substate\SubstateDTO;
use App\Interfaces\Viper\ProjectInterface;
use App\Models\Viper\Project;
use App\Utils\Viper\Filters\ProjectFilter;

// Librerias de terceros
use Illuminate\Http\Request;

/**
 * Servicio para manejar operaciones relacionadas con proyectos.
 *
 * Este servicio implementa la interfaz ProjectInterface y es responsable
 * de realizar operaciones como la creación, actualización, recuperación
 * y eliminación de proyectos.
 * @package    App\Service\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ProjectService implements ProjectInterface
{
     /**
     * Crea un nuevo proyecto.
     *
     * Toma un ProjectDTO, lo convierte a un modelo de Eloquent y lo guarda en la base de datos.
     *
     * @param ProjectRequestDTO $projectDTO DTO del proyecto a crear.
     */
    public function createNewProject(ProjectRequestDTO $projectDTO) : void
    {
        $project = new Project();
        $project->fill($projectDTO->toArray());
        $project->save();
    }

     /**
     * Actualiza un proyecto existente.
     *
     * Busca un proyecto por su identificador 'bpin', y actualiza sus datos con los proporcionados
     * en el ProjectDTO.
     *
     * @param ProjectRequestDTO $projectDTO DTO del proyecto con datos actualizados.
     * @param string $bpin Identificador único del proyecto a actualizar.
     */
    public function updateProject(ProjectRequestDTO $projectDTO, string $bpin) : void
    {
        $project = Project::findOrFail($bpin);
        $data = $projectDTO->toArray();
        $project->fill($data);
        $project->save();
    }

    /**
     * Obtiene una lista paginada de proyectos.
     *
     * Opcionalmente, filtra proyectos por nombre. Devuelve una lista paginada de ProjectSummaryDTOs.
     *
     * @param int $perPage Número de proyectos por página.
     * @param int $page Número de la página actual.
     * @param Request $request Peticion que contiene los parametros de filtrado.
     * @return array Array que contiene los proyectos paginados y metadatos de paginación.
     */
    public function getAllProjectsPaginated(int $perPage, int $page, array $queryParams = []): array
    {
        $filter = new ProjectFilter();
        $queryItems = $filter->transform($queryParams);

        $projectQuery = Project::with('state');
        foreach($queryItems as $item) {
            if(count($item) === 3) {
                $projectQuery->orWhere($item[0], $item[1], ($item[1]=="like"?"%".$item[2]."%":$item[2]));
            }
        }

        $paginatedProjects= $projectQuery->paginate(
            $perPage,  // numero de paginas por paginado
            ['bpin', 'name', 'state_id'], // columnas de la tabla Proyectos que requiero
            'page', // nombre del parámetro de consulta usado para la paginación (page por defecto)
            $page // numero de la pagina solicitada
            );

        $projectDTOs = $paginatedProjects->getCollection()
                        ->transform(
                            function($project)
                            {
                                $data = $project->toArray();
                                $data['state'] = $data['state']['name'];
                                return new ProjectSummaryDTO($data);
                            }
                        )->toArray();

        return [
            'data' => $projectDTOs,
            'current_page' => $paginatedProjects->currentPage(),
            'first_page_url' => $paginatedProjects->url(1),
            'from' => $paginatedProjects->firstItem(),
            'last_page' => $paginatedProjects->lastPage(),
            'last_page_url' => $paginatedProjects->url($paginatedProjects->lastPage()),
            'next_page_url' => $paginatedProjects->nextPageUrl(),
            'prev_page_url' => $paginatedProjects->previousPageUrl(),
            'per_page' => $paginatedProjects->perPage(),
            'to' => $paginatedProjects->lastItem(),
            'total' => $paginatedProjects->total(),
            'links' => $paginatedProjects->linkCollection(),
            'path' => $paginatedProjects->path()
        ];
    }

    /**
     * Recupera un proyecto por su identificador 'bpin'.
     *
     * @param string $bpin Identificador único del proyecto.
     * @return ProjectDataDTO DTO del proyecto encontrado.
     */
    public function getProjectByBPIN(string $bpin) : ProjectDataDTO
    {
        $project = Project::with(['department', 'municipality', 'state', 'substate', 'sector'])
                          ->findOrFail($bpin);
        // return $project;
        $data = $project->toArray();
        $data['department'] = new DepartmentDTO($data['department']);
        $data['state'] = $data['state']['name'];
        $data['sector'] = $data['sector']['name'];
        $data['municipality'] = is_null($data['municipality']) ? null : new MunicipalityDTO($data['municipality']);
        $data['substate'] = is_null($data['substate']) ? null : new SubstateDTO($data['substate']);

        return new ProjectDataDTO($data);
    }

    /**
     * Elimina un proyecto y devuelve sus datos.
     *
     * Busca un proyecto por su 'bpin', lo elimina y devuelve un DTO con sus datos.
     *
     * @param string $bpin Identificador único del proyecto a eliminar.
     * @return ProjectDataDTO DTO del proyecto eliminado.
     */
    public function deleteProject(string $bpin) : ProjectDataDTO
    {
        $project = Project::findOrFail($bpin);
        $projectDTO = $this->getProjectByBPIN($bpin);
        $project->delete();

        return $projectDTO;
    }
}
