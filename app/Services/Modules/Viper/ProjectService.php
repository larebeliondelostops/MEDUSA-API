<?php

namespace App\Services\Modules\Viper;

// Librerias del modulo viper

use App\Interfaces\Modules\Viper\ActivityInterface;
use App\Interfaces\Modules\Viper\Deliverable\DeliverableInterface;
use App\Interfaces\Modules\Viper\DepartmentInterface;
use App\Interfaces\Modules\Viper\FolderInterface;
use App\Interfaces\Modules\Viper\IndicatorInterface;
use App\Interfaces\Modules\Viper\LocationInterface;
use App\Interfaces\Modules\Viper\MeasurementUnitInterface;
use App\Interfaces\Modules\Viper\MunicipalityInterface;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Interfaces\Modules\Viper\ProjectInterface;
use App\Services\Modules\Viper\ProjectUserRoleService;
use App\Models\Modules\Viper\Project;
use App\Interfaces\Modules\Viper\ProjectMunicipalityInterface;
use App\Interfaces\Modules\Viper\ScopeInterface;
use App\Interfaces\Modules\Viper\SectorInterface;
use App\Interfaces\Modules\Viper\SpecificObjectiveInterface;
use App\Interfaces\Modules\Viper\StateInterface;
use App\Models\Modules\Viper\MeasurementUnit;
// Librerias de terceros
use App\Utils\Filters\Modules\Viper\ProjectFilter;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;

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
    private ProjectMunicipalityInterface $projectMunicipalityInterface;
    private SectorInterface $sectorInterface;
    private DepartmentInterface $departmentInterface;
    private MunicipalityInterface $municipalityInterface;
    private FolderInterface $folderInterface;
    private ScopeInterface  $scopeInterface;
    private SpecificObjectiveInterface $specificObjectiveInterface;
    private ProductInterface $productInterface;
    private DeliverableInterface $deliverableInterface;
    private IndicatorInterface $indicatorInterface;
    private StateInterface $stateInterface;    private ProjectUserRoleService $projectUserRoleService;

    private MeasurementUnitInterface $measurementUnitInterface;

    public function __construct(
        LocationInterface $locationInterface,
        ProjectMunicipalityInterface $projectMunicipalityInterface,
        SectorInterface $sectorInterface,
        DepartmentInterface $departmentInterface,
        MunicipalityInterface $municipalityInterface,
        FolderInterface $folderInterface,
        ScopeInterface $scopeInterface,
        SpecificObjectiveInterface $specificObjectiveInterface,
        ProductInterface $productInterface,
        DeliverableInterface $deliverableInterface,
        IndicatorInterface $indicatorInterface,
        ProjectUserRoleService $projectUserRoleService,
        StateInterface $stateInterface,
        MeasurementUnitInterface $measurementUnitInterface
    )
    {
        $this->locationInterface = $locationInterface;
        $this->projectMunicipalityInterface = $projectMunicipalityInterface;
        $this->sectorInterface = $sectorInterface;
        $this->departmentInterface = $departmentInterface;
        $this->municipalityInterface = $municipalityInterface;
        $this->folderInterface = $folderInterface;
        $this->specificObjectiveInterface = $specificObjectiveInterface;
        $this->scopeInterface = $scopeInterface;
        $this->productInterface = $productInterface;
        $this->deliverableInterface = $deliverableInterface;
        $this->indicatorInterface = $indicatorInterface;
        $this->projectUserRoleService = $projectUserRoleService;
        $this->stateInterface = $stateInterface;
        $this->measurementUnitInterface = $measurementUnitInterface;
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

        /**
         * Se registran todas las municipalidades y se relacionan
         * con el proyecto ya registrado
         */
        foreach($projectData['municipalities'] as $municipality)
        {
            $this->projectMunicipalityInterface->createProjectMunicipality(collect(
                [
                    "project_bpin" => $projectData['bpin'],
                    "municipality_id" => $municipality['municipality_id']
                ]
            ));
        }

        $this->projectUserRoleService->assignToMainUser($project['bpin']);

        return $this->getProjectByBPIN($project['bpin']);
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

        $existingMunicipalities = $this->projectMunicipalityInterface->getAllProjectMunicipalities(["bpin" => ["eq" => $projectData["bpin"]]])->toArray();
        $requestMunicipalities = array_map(function($municipality) {
            return ['id' => $municipality['municipality_id']];
        }, $projectData['municipalities']);
        
       // Obtener los IDs de los municipios existentes y de los municipios del proyecto
        $existingMunicipalityIds = array_column($existingMunicipalities, 'id');
        $requestMunicipalityIds = array_column($requestMunicipalities, 'id');

        // Determinar los IDs de los municipios que se deben crear
        $municipalitiesIdsForCreate = array_values(array_diff($requestMunicipalityIds, $existingMunicipalityIds));

        // Iterar sobre los IDs de los municipios que se deben crear y crearlos
        foreach ($municipalitiesIdsForCreate as $municipalityId) {
            // Verificar si existe una entrada previamente eliminada suavemente para este municipio
            $existingMunicipality = $this->projectMunicipalityInterface->getSoftDeletedProjectMunicipality($projectData['bpin'], $municipalityId);
        
            if ($existingMunicipality->isNotEmpty()) {
                // Si existe, restaurar la entrada eliminada suavemente
                $this->projectMunicipalityInterface->restoreSoftDeletedProjectMunicipality($existingMunicipality->first()->id);
            } else {
                // Si no existe, crear una nueva entrada
                $this->projectMunicipalityInterface->createProjectMunicipality(collect(
                    [
                        "project_bpin" => $projectData['bpin'],
                        "municipality_id" => $municipalityId
                    ]
                ));
            }
        }

        // Determinar los IDs de los municipios que se deben eliminar
        $municipalitiesIdsForDelete = array_values(array_diff($existingMunicipalityIds, $requestMunicipalityIds));

        // Iterar sobre los IDs de los municipios que se deben eliminar y eliminarlos
        foreach ($municipalitiesIdsForDelete as $municipalityId) {
            $this->projectMunicipalityInterface->deleteProjectMunicipality($municipalityId);
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
        $project = Project::with(['projectMunicipality.municipality', 'department', 'state', 'substate', 'sector', 'locations', 'locations.coordinate'])
                        ->findOrFail($bpin);
        
        $projectData = $project->toArray();
        $projectData['municipalities'] = array_map(
            function($municipality)
            {
                return $municipality['municipality'];
            },
            $projectData['project_municipality']
        );
        unset($projectData['project_municipality']);

        $projectData['total_value'] = (float)$projectData['total_value'];

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

    /**
     * Crea un nuevo proyecto a partir de un archivo MGA.
     * 
     * @param UploadedFile $mgaFile
     * @return Collection
     */
    public function createNewProjectFromMGA(UploadedFile $mgaFile): Collection
    {
        try {
            // Verifica si el archivo MGA es válido
            if (!$mgaFile->isValid()) {
                throw new \InvalidArgumentException('El archivo MGA no es válido.');
            }

            // Configura el cliente GuzzleHttp con la opción 'verify' establecida en false
            $client = new Client([
                'verify' => false, // Desactiva la verificación del certificado SSL
            ]);

            // Envía la solicitud POST al servicio externo con el archivo adjunto como form-data
            $response = $client->request('POST', 'https://' . env('SCRAPINGDOCS_URL') . '/mga-extractor-information', [
                'multipart' => [
                    [
                        'name' => 'mgaFile', // Nombre del campo en el formulario
                        'contents' => fopen($mgaFile->path(), 'r'), // Contenido del archivo
                        'filename' => $mgaFile->getClientOriginalName() // Nombre original del archivo
                    ]
                ]
            ]);

            // Verifica si la solicitud fue exitosa
            if ($response->getStatusCode() !== 200) {
                throw new \RuntimeException('Error al enviar el archivo MGA al servicio externo.');
            }

            $dataMga = json_decode($response->getBody()->getContents(), true)['mgaData'];
            $municipalities = array_map(
                function($municipality) {
                    return ['municipality_id' => $this->municipalityInterface->getAllMunicipalities(["nameMunicipality" => ["eq" => $municipality]])->first()->id];
                },
                $dataMga['municipalities'][0]
            );
            $department_id = $this->departmentInterface->getAllDepartments(["nameDepartment" => ["eq" => $dataMga['department']]])->first()->id;
            $sector_id = $this->sectorInterface->getAllSectors(["nameSector" => ["eq" => $dataMga['sector']]])->first()->id;
            $state_id = $this->stateInterface->getAllStates(["nameState" => ["eq" => "Aprobado"]])->first()['id'];

            $project = $this->createNewProject(
                collect([ 
                    "bpin" => $dataMga['bpin'],
                    "name" => $dataMga['name'],
                    "ocad" => "",
                    "state_id" => $state_id,
                    "substate_id" => null,
                    "total_value" => $dataMga['total_value'],
                    "responsible_entity" => "",
                    "sector_id" => $sector_id,
                    "department_id" => $department_id,
                    "municipalities" => $municipalities,
                    "locations" => [],
                    "beneficiaries" => $dataMga['beneficiaries'],
                    "planner" => $dataMga['planner'] ?? '',
                    "execution_approval_date" => null,
                    "completion_date" => null,
                    "start_date_execution_phase" => null,
                    "unilateral_termination" => null,
                    "bilateral_termination" => null,
                    "project_duration_in_months" => null,
                    "reporting_frequency" => null,
                ])
            );
            
            // Se crean las carpetas
            $structureFolder = '
            {
                "folders": [
                     {
                        "name": "Formulación",
                        "stage_id": 1
                    },
                    {
                        "name": "Presentación",
                        "stage_id": 2,
                        "subfolders": [
                            {"name": "Proyecto en revisión"},
                            {"name": "Fichas de revisión"}
                        ]
                    },
                    {
                        "name": "Viabilización",
                        "stage_id": 3,
                        "subfolders": [
                            {"name": "Proyecto aprobado"},
                            {
                                "name": "Viabilización - Estructura del proyecto",
                                "subfolders": [
                                    {"name": "Aspectos técnicos"},
                                    {"name": "Aspectos financieros"},
                                    {"name": "Aspectos jurídicos"}
                                ]
                            }
                        ]
                    },
                      {
                        "name": "Programación",
                        "stage_id": 4,
                        "subfolders": [
                            {
                                "name": "Ejecutor del proyecto"
                            },
                            {
                                "name": "Ajustes de programación"
                            },
                            {
                                "name": "Gesproy",
                                "subfolders": [
                                    {"name": "Programación inicial"},
                                    {"name": "Documentos soportes reprogramacion inicial"}
                                ]
                            },
                            {
                                "name": "Requisitos previos de ejecución",
                                "subfolders": [
                                    {"name": "Requisitos previos al cumplimiento de ejecución del proyecto"},
                                    {"name": "Certificado de cumplimiento de requisitos previos de ejecución"}
                                ]
                            }
                        ]
                    },
                      {
                        "name": "Ejecución",
                        "stage_id": 5,
                        "subfolders": [
                             {
                                "name": "CARPETA GESPROY",
                                "subfolders": [
                                    {"name": "Reporte de Ejecución"}
                                ]
                            },
                            {
                                "name": "Contratos del proyecto",
                                "subfolders": [
                                    {
                                        "name": "Interventoría",
                                        "subfolders": [
                                            {"name": "Ajustes de interventoría"},
                                            {"name": "Precontractual de interventoría"},
                                            {"name": "Contractual de interventoría"},
                                            {"name": "Ejecución de interventoría"},
                                            {"name": "Cierre de interventoría"}
                                        ]
                                    }
                                ]
                            },
                            {
                                "name": "Actuaciones de los órganos de control",
                                "subfolders": [
                                    {"name": "Contraloría general"},
                                    {"name": "Procuraduría general"},
                                    {"name": "Fiscalía general"},
                                    {
                                        "name": "DNP",
                                        "subfolders": [
                                            {"name": "Visita de seguimiento del proyecto"},
                                            {"name": "Plan de acción y soportes de cumplimiento del mismo"},
                                            {"name": "Procedimiento preventivo PAP"}
                                        ]
                                    }
                                ]
                            }
                        ]
                    },
                     {
                        "name": "Cierre",
                        "stage_id": 6,
                        "subfolders": [
                            {"name": "Cierre de Proyecto"},
                            {"name": "Evaluación Ejecutiva de resultados del proyecto"},
                            {"name": "Ajustes de cierre"}
                        ]
                    },
                    {
                        "name": "Operación",
                        "stage_id": 7
                    }
                ]
            }            
            ';

            $foldersData = json_decode($structureFolder, true)['folders'];
            foreach ($foldersData as $folderData) {
                $this->folderInterface->createFolderHierarchy($folderData, $dataMga['bpin']);
            }

            // crea el alcance del proyecto
            $scope = $this->scopeInterface->createNewScope(
                collect([
                    "project_id" => $dataMga['bpin'],
                    "description" => $dataMga['scope']
                ])
            );

            $folder_id = $this->folderInterface->getAllFolders($dataMga['bpin'], ['name' => ['cont' => '%Ejecución de interventoría%']])[0]['folder']['id'];
            // crea los objetivos especificos
            foreach($dataMga['specific_objectives'] as $specificObjective)
            {
                $specificObjectiveSaved = $this->specificObjectiveInterface->createNewSpecificObjective(
                    collect([
                        "description" => $specificObjective['description'],
                        "scope_id" => $scope['id']
                    ])
                );
                
                $measurement_unit_id = $this->measurementUnitInterface->getAllMeasurementUnits(["nameMeasurementUnit" => ["eq" => '--sin especificar--']])->first()->id; 
                foreach ($specificObjective['products'] as $product)
                {
                    $parts = explode('.', $product['number']);
                    $number = intval(end($parts));
                    $productForSave = collect([
                        "name" => $product['description'],
                        "number" => $number,
                        "amount" => $product['amount'],
                        "folder_id" => $folder_id,
                        "specific_objective_id" => $specificObjectiveSaved['id'],
                        "measurement_unit_id" => $measurement_unit_id,
                    ]);
                    $productSaved = $this->productInterface->storeProduct(
                       $productForSave 
                    );

                    foreach ($product['activities'] as $activity)
                    {
                        $parts = explode('.', $activity['number']);
                        $number = intval(end($parts));
                        $this->deliverableInterface->createNewDeliverable(
                            collect([
                                'name' => $activity['description'],
                                'number' => $number,
                                'product_id' => $productSaved['id'],
                                'deliverable_id' => null,
                            ])
                        );
                    }
                    
                    $measurement_unit_id = $this->measurementUnitInterface->getAllMeasurementUnits(["nameMeasurementUnit" => ["eq" => '--sin especificar--']])->first()->id;
                    foreach($product['indicators'] as $indicator)
                    {
                        $parts = explode('.', $indicator['number']);
                        $number = intval(end($parts));
                        $indicatorData = collect([
                            'name' => $indicator['description'],
                            'start_year_of_goal' => null,
                            'end_year_goal' => null,
                            'target_value' => 0,
                            'progress' => 0.0,
                            'percentage_completed' => 0.0,
                            'is_main' => ($indicator['isMain'] === 'Si'? true: false),
                            'product_id' => $productSaved['id'],
                            'measurement_unit_id' => $measurement_unit_id,
                        ]);
                        $this->indicatorInterface->createNewIndicator(
                            $indicatorData
                        );
                    }
                }

            }

            // Devuelve la información obtenida del servicio externo como una colección
            return collect($dataMga);
        } catch (RequestException $e) {
            // Lanza la excepción nuevamente para que pueda ser manejada en otro lugar si es necesario
            throw $e;
        }
    }
}
