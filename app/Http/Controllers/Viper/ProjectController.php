<?php

namespace App\Http\Controllers\Viper;

// Librerias de terceros
use App\DTOs\Viper\Project\ProjectRequestDTO;

// Librerias del modulo viper
use App\Http\Request\Viper\ProjectRequest;
use App\Interfaces\Viper\ProjectInterface;

// Librerias para el manejo de excepciones
use Illuminate\Database\QueryException;
use PDOException;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador del módulo VIPER
 *
 * Este controlador gestiona las operaciones relacionadas con los proyectos, incluyendo la creación,
 * actualización, recuperación y eliminación de proyectos.
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
class ProjectController extends BaseController
{
    // Número de proyectos por página para la paginación.
    private const DEFAULT_PROJECT_PER_PAGE = 8;

    // Interface con todas las funcionalidades de la logica del negocio
    private ProjectInterface $projectInterface;

    /**
     * Constructor del controlador.
     *
     * Inyecta la interfaz ProjectInterface para interactuar con la lógica del negocio.
     *
     * @param ProjectInterface $projectInterface Interfaz para las operaciones de negocio de proyectos.
     */
    public function __construct(ProjectInterface $projectInterface)
    {
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
        $this->projectInterface = $projectInterface;
    }

     /**
     * Crea un nuevo proyecto.
     *
     * Valida la solicitud entrante y, si es válida, utiliza la interfaz del servicio para
     * crear un nuevo proyecto en la base de datos.
     *
     * @param ProjectRequest $request Datos de la solicitud validados para la creación del proyecto.
     * @return \Illuminate\Http\Response Respuesta JSON con los datos del proyecto creado.
     */
    public function store(ProjectRequest $request)
    {
        try
        {
            $validatedData = $request->validated();
            $projectDTO = new ProjectRequestDTO($validatedData);

            $this->projectInterface->createNewProject($projectDTO);
            return response()->json([
                'success' => true,
                'message' => 'Project created successfully.',
                'data'    => $projectDTO,
            ], 201);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }


    /**
     * Actualiza un proyecto existente.
     *
     * Utiliza los datos validados de la solicitud para actualizar un proyecto específico.
     * Identifica el proyecto por su 'bpin'.
     *
     * @param ProjectRequest $request Datos de la solicitud validados para la actualización del proyecto.
     * @param string $bpin Identificador único del proyecto a actualizar.
     * @return \Illuminate\Http\Response Respuesta JSON con los datos del proyecto actualizado.
     */
    public function update(ProjectRequest $request, string $bpin)
    {
        try
        {
            $validatedData = $request->validated();
            $projectDTO = new ProjectRequestDTO($validatedData);

            $this->projectInterface->updateProject($projectDTO, $bpin);

            return response()->json([
                'success' => true,
                'message' => 'Project updated successfully.',
                'data'    => $projectDTO,
            ], 200);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

   /**
     * Obtiene una lista paginada de proyectos.
     *
     * Opcionalmente, puede filtrar los proyectos por nombre.
     * Devuelve una lista paginada de proyectos con la paginación y los datos de los proyectos.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP, que puede incluir parámetros de filtrado.
     * @return \Illuminate\Http\Response Respuesta JSON con la lista paginada de proyectos.
     */
    public function index(Request $request)
    {
        try
        {
            $page = $request->input('page', 1);
            $name = $request->input('name', null);
            $paginatedProjects = $this->projectInterface->getAllProjectsPaginated(self::DEFAULT_PROJECT_PER_PAGE, $page, $request);
            return response()->json($paginatedProjects, 200);
        }
        catch(Exception $exception) // Error general
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene los detalles de un proyecto específico.
     *
     * Busca y devuelve los detalles de un proyecto, identificado por su 'bpin'.
     *
     * @param string $bpin Identificador único del proyecto a mostrar.
     * @return \Illuminate\Http\Response Respuesta JSON con los datos del proyecto solicitado.
     */
    public function show(Request $request, string $bpin)
    {
        try
        {
            $projectDTO = $this->projectInterface->getProjectByBPIN($bpin);
            return response()->json($projectDTO, 200);
        }
        catch(Exception $exception) // Error general
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un proyecto específico.
     *
     * Elimina el proyecto identificado por su 'bpin' y devuelve los datos del proyecto eliminado.
     *
     * @param string $bpin Identificador único del proyecto a eliminar.
     * @return \Illuminate\Http\Response Respuesta JSON con los datos del proyecto eliminado.
     */
    public function destroy(Request $request, string $bpin)
    {
        try
        {
            $projectDTO = $this->projectInterface->deleteProject($bpin);
            return response()->json($projectDTO, 200);
        }
        catch(Exception $exception) // Error al eliminar proyecto no existente
        {
            return $this->handleException($exception);
        }
    }
}
