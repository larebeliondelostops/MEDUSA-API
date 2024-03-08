<?php

namespace App\Http\Controllers\Viper;

// Librerias del Modulo Viper
use App\Http\Request\Viper\StateRequest;
use App\Interfaces\Viper\StateInterface;

// Librerias de terceros
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controlador para la gestión de estados del módulo VIPER
 *
 * Este controlador gestiona las operaciones relacionadas con los estados que un proyecto puede tener,
 * incluyendo la creación, actualización, recuperación y eliminación de estados.
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v2.0.0
 */
class StateController extends BaseController
{
    private StateInterface $stateInterface;

    /**
     * Constructor del controlador.
     *
     * Inicializa la interfaz de estado, que es inyectada a través de la inyección de dependencias.
     *
     * @param StateInterface $stateInterface Interfaz para la lógica de negocio de estados.
     */
    public function __construct(StateInterface $stateInterface)
    {
        parent::__construct(); // Se llama al constructor padre para que se realice configuración del Base Controller para el manejo de excepciones.
        $this->stateInterface = $stateInterface; // inyeccion de dependecias
    }

    /**
     * Almacena un nuevo estado en la base de datos.
     *
     * Valida los datos de la solicitud y crea un nuevo estado mediante la interfaz StateInterface.
     * Retorna una respuesta JSON con el estado creado.
     *
     * @param StateRequest $request Datos validados de la solicitud para crear un estado.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON del estado creado.
     */
    public function store(StateRequest $request)
    {
        try
        {
            $stateCreated = $this->stateInterface->createNewState(collect($request->validated()));
            return response()->json([
                'message' => 'State created successfully',
                'data' => $stateCreated
            ], Response::HTTP_CREATED);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un estado existente.
     *
     * Valida y actualiza los datos de un estado específico identificado por su ID.
     * Retorna una respuesta JSON con los datos del estado actualizado.
     *
     * @param StateRequest $request Datos validados de la solicitud para actualizar un estado.
     * @param int $id Identificador del estado a actualizar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON del estado actualizado.
     */
    public function update(StateRequest $request, int $id)
    {
        try
        {
            $stateUpdated = $this->stateInterface->updateState($id, collect($request->validated()));

            return response()->json([
                'message' => 'State updated successfully.',
                'data'    => $stateUpdated,

            ], Response::HTTP_OK);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Muestra los detalles de un estado específico.
     *
     * Recupera y retorna los detalles de un estado dado su ID.
     *
     * @param int $id Identificador del estado a mostrar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con los detalles del estado.
     */
    public function show(Request $request, int $id)
    {
        try
        {
            $state = $this->stateInterface->getStateById($id);
            return response()->json([
                'message' => 'State got successfully',
                'data'=> $state,

            ], Response::HTTP_OK);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un estado específico.
     *
     * Elimina un estado identificado por su ID y retorna una confirmación.
     *
     * @param int $id Identificador del estado a eliminar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON de confirmación de eliminación.
     */
    public function destroy(Request $request, int $id)
    {
        try
        {
            $state = $this->stateInterface->deleteState($id);
            return response()->json([
                'message' => 'State deleted successfully',
                'data'=> $state
            ], Response::HTTP_OK);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

     /**
     * Lista todos los estados disponibles.
     *
     * Retorna una lista de todos los estados existentes en la base de datos.
     *
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con la lista de estados.
     */
    public function index(Request $request)
    {
        try
        {
            return response()->json([
                "data" => $this->stateInterface->getAllStates(),
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
}
