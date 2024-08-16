<?php

namespace App\Http\Controllers\Modules\Viper;

// Librerias de terceros
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Librerias del modulo viper
use App\Http\Request\Modules\Viper\ProjectMunicipalityRequest;
use App\Interfaces\Modules\Viper\ProjectMunicipalityInterface;
// Librerias para el manejo de excepciones
use Exception;

/**
 * Controlador para la gestión de proyectos del módulo VIPER
 *
 * Este controlador gestiona las operaciones relacionadas con los proyectos, incluyendo la creación,
 * actualización, recuperación y eliminación de proyectos.
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.0
 */
class ProjectMunicipalityController extends BaseController
{
    // Interface con todas las funcionalidades de la logica del negocio
    private ProjectMunicipalityInterface $projectMunicipalityInterface;

    /**
     * Constructor del controlador.
     *
     * Inyecta la interfaz ProjectInterface para interactuar con la lógica del negocio.
     *
     * @param ProjectInterface $projectInterface Interfaz para las operaciones de negocio de proyectos.
     */
    public function __construct(ProjectMunicipalityInterface $projectMunicipalityInterface)
    {
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
        $this->projectMunicipalityInterface = $projectMunicipalityInterface;
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
    public function store(ProjectMunicipalityRequest $request)
    {
        try
        {
            $projectMunicipalitySavedDTO = $this->projectMunicipalityInterface->createProjectMunicipality(collect($request->validated()));
            return response()->json([
                'message' => 'Proyecto creado satisfactoriamente.',
                'data'    => $projectMunicipalitySavedDTO,
            ], Response::HTTP_CREATED);
        }
        catch (Exception $exception)
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
            $queryFilterParam = $request->query();
            $projectMunicipalities = $this->projectMunicipalityInterface->getAllProjectMunicipalities($queryFilterParam);
            return response()->json($projectMunicipalities, Response::HTTP_OK);
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
    public function show(Request $request, int $id)
    {
        try
        {
            $projectDTO = $this->projectMunicipalityInterface->getProjectMunicipality($id);
            return response()->json([
                "data" => $projectDTO,
            ], Response::HTTP_OK);
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
    public function destroy(Request $request, int $id)
    {
        try
        {
            $projectDTO = $this->projectMunicipalityInterface->deleteProjectMunicipality($id);
            return response()->json([
                "message" => "Proyecto eliminado satisfactoriamente.",
                "data" => $projectDTO
            ], Response::HTTP_OK);
        }
        catch(Exception $exception) // Error al eliminar proyecto no existente
        {
            return $this->handleException($exception);
        }
    }
}
