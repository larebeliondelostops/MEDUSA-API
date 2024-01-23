<?php

namespace App\Services\Viper;

// Librerias del modulo viper
use App\DTOs\Viper\Department\DepartmentDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\DTOs\Viper\Project\ProjectDetailDTO;
use App\DTOs\Viper\Project\ProjectRequestDTO;
use App\DTOs\Viper\Project\ProjectSummaryDTO;
use App\DTOs\Viper\Substate\SubstateDTO;
use App\Interfaces\Viper\LocationInterface;
use App\Interfaces\Viper\ProjectInterface;
use App\Models\Viper\Project;
use App\Utils\Viper\Filters\ProjectFilter;

// Librerias de terceros
use Illuminate\Http\Request;

/**
 * Servicio para manejar operaciones relacionadas con proyectos.
 *
 * Este servicio implementa la interfaz ProjectInterface y es responsable
 * de implementar las operaciones como la creación, actualización, recuperación
 * y eliminación de proyectos.
 * @package    App\Service\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.2
 */
class ProjectService implements ProjectInterface
{
    private LocationInterface $locationInterface;

    public function __construct(LocationInterface $locationInterface)
    {
        $this->locationInterface = $locationInterface;
    }

     /**
     * Crea un nuevo proyecto.
     *
     * Toma un ProjectDTO, lo convierte a un modelo de Eloquent y lo guarda en la base de datos.
     *
     * @param ProjectRequestDTO $projectDTO DTO del proyecto a crear.
     * @return ProjectRequestDTO DTO que contiene la información almacenada.
     */
    public function createNewProject(ProjectRequestDTO $projectDTO) : ProjectRequestDTO
    {
        //primero se crea la ubicacion del proyecto para obtener su id
        $locationProjectDTO = $this->locationInterface->createNewLocation($projectDTO->location);

        //una vez almacenada la ubicacion se almacena el proyecto
        $project = new Project(
            $projectDTO->toArray() +
            ['location_id' => $locationProjectDTO->id ] // id de la locacion para el proyecto
        );
        $project->save();

        return new ProjectRequestDTO(
            $project->toArray() +
            ['location'=> $locationProjectDTO]
        );
    }

     /**
     * Actualiza un proyecto existente.
     *
     * Busca un proyecto por su identificador 'bpin', y actualiza sus datos con los proporcionados
     * en el ProjectDTO.
     *
     * @param ProjectRequestDTO $projectDTO DTO del proyecto con datos actualizados.
     * @param string $bpin Identificador único del proyecto a actualizar.
     * @return ProjectRequestDTO DTO del proyecto con la data almacenada.
     */
    public function updateProject(ProjectRequestDTO $projectDTO, string $bpin) : ProjectRequestDTO
    {
        $project = Project::with('location')->findOrFail($bpin);
        $locationProject = new LocationRequestDTO($project->location->toArray());
        $locationUpdated = $this->locationInterface->updateLocationById($locationProject, $locationProject->id);
        $project->fill($projectDTO->toArray());
        $project->save();
        $dataUpdated = $project->toArray();
        $dataUpdated['location'] = $locationUpdated;

        return new ProjectRequestDTO(
            $dataUpdated
        );
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
     * @return ProjectDetailDTO DTO del proyecto encontrado.
     */
    public function getProjectByBPIN(string $bpin) : ProjectDetailDTO
    {
        $project = Project::with(['department', 'municipality', 'state', 'substate', 'sector', 'location'])
                          ->findOrFail($bpin);
        // return $project;
        $data = $project->toArray();
        $data['department'] = new DepartmentDTO($data['department']);
        $data['state'] = $data['state']['name'];
        $data['sector'] = $data['sector']['name'];
        $data['municipality'] = is_null($data['municipality']) ? null : new MunicipalityDTO($data['municipality']);
        $data['substate'] = is_null($data['substate']) ? null : new SubstateDTO($data['substate']);
        $data['location'] = new LocationRequestDTO($data['location']);

        return new ProjectDetailDTO($data);
    }

    /**
     * Elimina un proyecto y devuelve sus datos.
     *
     * Busca un proyecto por su 'bpin', lo elimina y devuelve un DTO con sus datos.
     *
     * @param string $bpin Identificador único del proyecto a eliminar.
     * @return ProjectDetailDTO DTO del proyecto eliminado.
     */
    public function deleteProject(string $bpin) : ProjectDetailDTO
    {
        $project = Project::findOrFail($bpin);
        $projectDTO = $this->getProjectByBPIN($bpin);
        $project->delete();
        $this->locationInterface->deleteLocation($projectDTO->location->id);
        return $projectDTO;
    }
}
