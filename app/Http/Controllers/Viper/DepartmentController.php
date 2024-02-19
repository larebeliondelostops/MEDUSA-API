<?php

namespace App\Http\Controllers\Viper;

// Librerias del modulo viper
use App\DTOs\Viper\Department\DepartmentRequestDTO;
use App\DTOs\Viper\Location\LocationRequestDTO;
use App\Http\Request\Viper\DepartmentRequest;
use App\Interfaces\Viper\DepartmentInterface;

// Librerias de terceros
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controlador para la gestión de departamentos en el módulo VIPER.
 *
 * Este controlador maneja las operaciones de creación, actualización, visualización y eliminación de departamentos,
 * interactuando con la interfaz DepartmentInterface para realizar la lógica de negocio correspondiente.
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
class DepartmentController extends BaseController
{
    private DepartmentInterface $departmentInterface;

    /**
     * Constructor del controlador.
     *
     * Inicializa la interfaz de departamento, inyectada a través de la inyección de dependencias.
     *
     * @param DepartmentInterface $departmentInterface Interfaz para la lógica de negocio de departamentos.
     */
    public function __construct(DepartmentInterface $departmentInterface)
    {
        parent::__construct(); // Se llama al constructor padre para que se realice configuración del Base Controller para el manejo de excepciones.
        $this->departmentInterface = $departmentInterface;
    }

    /**
     * Crea un nuevo departamento.
     *
     * Valida los datos de la solicitud y crea un nuevo departamento utilizando la interfaz DepartmentInterface.
     * Retorna una respuesta JSON con el departamento creado.
     *
     * @param DepartmentRequest $request Datos validados de la solicitud para crear un departamento.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON del departamento creado.
     */
    public function store(DepartmentRequest $request)
    {
        try
        {
            $data = $request->validated();
            $departmentSaved = $this->departmentInterface->createNewDepartment(
                new DepartmentRequestDTO($data)
            );
            return response()->json([
                "message" => "Departamento creado satisfactoriamente.",
                "data" => $departmentSaved
            ], Response::HTTP_CREATED);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Lista todos los departamentos.
     *
     * Retorna una lista de todos los departamentos existentes en la base de datos en forma de respuesta JSON.
     *
     * @param Request $request Solicitud HTTP.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con la lista de departamentos.
     */
    public function index(Request $request)
    {
        try
        {
            $departmens = $this->departmentInterface->getAllDepartments();
            return response()->json([
                "data"=> $departmens,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Muestra los detalles de un departamento específico.
     *
     * Recupera y retorna los detalles de un departamento dado su ID.
     *
     * @param Request $request Solicitud HTTP.
     * @param int $id Identificador del departamento.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con los detalles del departamento.
     */
    public function show(Request $request, int $id)
    {
        try
        {
            $department = $this->departmentInterface->getDepartmentById($id);
            return response()->json([
                "data" => $department,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un departamento existente.
     *
     * Valida y actualiza los datos de un departamento específico identificado por su ID.
     * Retorna una respuesta JSON con los datos del departamento actualizado.
     *
     * @param DepartmentRequest $request Datos validados de la solicitud para actualizar un departamento.
     * @param int $id Identificador del departamento a actualizar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON del departamento actualizado.
     */
    public function update(DepartmentRequest $request, int $id)
    {
        try
        {
            $data = $request->validated();
            $departmentForUpdate = new DepartmentRequestDTO($data);
            $departmentUpdated = $this->departmentInterface->updateDepartment($departmentForUpdate, $id);
            return response()->json([
                "message" => "Departamento actualizado satisfactoriamente",
                "data" => $departmentUpdated,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un departamento.
     *
     * Elimina un departamento identificado por su ID y retorna una confirmación.
     *
     * @param Request $request Solicitud HTTP.
     * @param int $id Identificador del departamento a eliminar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON de confirmación de eliminación.
     */
    public function destroy(Request $request, int $id)
    {
        try
        {
            $departmentDeleted = $this->departmentInterface->deleteDepartment($id);
            return response()->json([
                "message" => "Departamento eliminado satisfactoriamente.",
                "data"=> $departmentDeleted,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
}
