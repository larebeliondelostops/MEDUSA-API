<?php

namespace App\Services\Modules\Viper;

// Librerias del modulo viper

use App\Helpers\Modules\Viper\AlertCreator;
use App\Interfaces\Modules\Viper\AlertInterface;
use App\Interfaces\Modules\Viper\LocationInterface;
use App\Interfaces\Modules\Viper\ProjectInterface;
use App\Models\Modules\Viper\Project;

// Librerias de terceros
use App\Utils\Filters\Modules\Viper\ProjectFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Servicio para manejar operaciones relacionadas con proyectos.
 *
 * Este servicio implementa la interfaz ProjectInterface y es responsable
 * de implementar las operaciones como la creación, actualización, recuperación
 * y eliminación de proyectos.
 * @package    App\Service\Modules\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.2
 */
class ProjectService implements ProjectInterface
{
    private LocationInterface $locationInterface;
    private AlertInterface $alertInterface;

    public function __construct(LocationInterface $locationInterface, AlertInterface $alertInterface)
    {
        $this->locationInterface = $locationInterface;
        $this->alertInterface = $alertInterface;
    }

     /**
     * Crea un nuevo proyecto.
     *
     * Toma un ProjectDTO, lo convierte a un modelo de Eloquent y lo guarda en la base de datos.
     *
     * @param Collection $projectDTO DTO del proyecto a crear.
     * @return Collection Data que contiene la información almacenada.
     */
    public function createNewProject(Collection $projectData) : Collection
    {

        /**
         * Se almacena el proyecto para poder relacionarlo
         * con sus locaciones una vez registrado
         */
        $project = new Project(
            $projectData->toArray()
        );
        $project->save();

        /**
         * Se registran todas las locaciones y se relacionan
         * con el proyecto ya registrado
         */
        foreach($projectData['locations'] as $location)
        {
            $location['project_bpin'] = $projectData['bpin'];
            $location  = $this->locationInterface->createNewLocation(
                collect($location)
            );
        }

        $alertData = AlertCreator::createAlertCumplimientoRequisitosIniciales($projectData['bpin'], $projectData['execution_approval_date']);
        $alert = [
            "name" => $alertData["name"],
            "type" => $alertData["type"],
            "state" => "estado_de_alerta",
            "description" => $alertData["description"],
            "indicator_id" => null,
            "project_id"=> $projectData['bpin']
        ];

        $this->alertInterface->createNewAlert(collect($alert));
        return $this->getProjectByBPIN($projectData['bpin']);
    }

     /**
     * Actualiza un proyecto existente.
     *
     * Busca un proyecto por su identificador 'bpin', y actualiza sus datos con los proporcionados
     * en el ProjectDTO.
     *
     * @param Collection $projectDTO DTO del proyecto con datos actualizados.
     * @param string $bpin Identificador único del proyecto a actualizar.
     * @return Collection Data del proyecto con la data almacenada.
     */
    public function updateProject(Collection $projectData, string $bpin) : Collection
    {
        //actualizamos los datos del proyecto
        $project = Project::findOrFail($bpin);
        $project->fill($projectData->toArray());
        $project->save();

        foreach($projectData['locations'] as $location)
        {
            if (array_key_exists('id', $location))
            {
                $location['project_bpin'] = $bpin;
                $this->locationInterface->updateLocationById(
                    collect($location),
                    $location['id']
                );
            }
            else // sino tiene id es porque es una locacion nueva
            {
                $location['project_bpin'] = $bpin;
                $location  = $this->locationInterface->createNewLocation(
                    collect($location)
                );
            }
        }

        return $this->getProjectByBPIN($bpin);
    }

        /**
     * Obtiene una lista de todos los proyectos.
     *
     * @return Collection Collection con todos los proyectos.
     */
    public function getAllProjects() : Collection
    {
        $projectsGot = Project::with('state')->get();
        $projectsGot->transform(
            function (Project $project)
            {
                $data = $project->toArray();
                $data['state'] = $data['state']['name'];
                return collect($data)->only(['bpin', 'name', 'state']);
            }
        );
        return collect($projectsGot);
    }


    /**
     * Obtiene una lista paginada de proyectos.
     *
     * Opcionalmente, filtra proyectos por nombre. Devuelve una lista paginada de ProjectSummaryDTOs.
     *
     * @param int $perPage Número de proyectos por página.
     * @param int $page Número de la página actual.
     * @param array $queryParams Parametros de filtrado.
     * @return Collection Array que contiene los proyectos paginados y metadatos de paginación.
     */
    public function getAllProjectsPaginated(int $perPage, int $page, array $queryParams = []): Collection
    {
        $filter = new ProjectFilter();
        $queryItems = $filter->transform($queryParams);

        $projectQuery = Project::with('state');
        foreach($queryItems as $item) {
            if(count($item) === 3) {
                $projectQuery->orWhere($item[0], $item[1], ($item[1]=="like"?"%".$item[2]."%":$item[2]));
            }
        }

        $paginatedProjects = $projectQuery->paginate(
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
                                return collect($data)->only(['bpin', 'name', 'state']);
                            }
                        )->toArray();

        return collect([
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
        ]);
    }

    /**
     * Recupera un proyecto por su identificador 'bpin'.
     *
     * @param string $bpin Identificador único del proyecto.
     * @return Collection Data del proyecto encontrado.
     */
    public function getProjectByBPIN(string $bpin) : Collection
    {
        $project = Project::with(['department', 'municipality', 'state', 'substate', 'sector', 'locations', 'locations.coordinate'])
                          ->findOrFail($bpin);
        
        $projectData = $project->toArray();
        $projectData['total_value'] = (float)$projectData['total_value'];
        $projectData['requested_value'] = (float)$projectData['requested_value'];

        foreach ($projectData['locations'] as $key => $location)
        {
            $projectData['locations'][$key]['coordinate']['latitude'] = (float) $location['coordinate']['latitude'];
            $projectData['locations'][$key]['coordinate']['longitude'] = (float) $location['coordinate']['longitude'];
        }
        
        return collect($projectData);
    }

    /**
     * Elimina un proyecto y devuelve sus datos.
     *
     * Busca un proyecto por su 'bpin', lo elimina y devuelve un DTO con sus datos.
     *
     * @param string $bpin Identificador único del proyecto a eliminar.
     * @return Collection Data del proyecto eliminado.
     */
    public function deleteProject(string $bpin) : Collection
    {
        $project = Project::findOrFail($bpin);
        $projectDTO = $this->getProjectByBPIN($bpin);
        $project->delete();
        return $projectDTO;
    }
}
