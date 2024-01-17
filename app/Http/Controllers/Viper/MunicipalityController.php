<?php

namespace App\Http\Controllers\Viper;

// Librerias del modulo viper
use App\DTOs\Viper\Municipality\MunicipalityDTO;
use App\Http\Request\Viper\MunicipalityRequest;
use App\Interfaces\Viper\MunicipalityInterface;

// Librerias de terceros
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controlador para la gestión de municipios en el módulo VIPER.
 *
 * Este controlador realiza operaciones como la creación, actualización, visualización y eliminación de municipios,
 * utilizando la interfaz MunicipalityInterface para interactuar con la lógica de negocio.
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @version    v1.0.2
 */
class MunicipalityController extends BaseController
{
    private MunicipalityInterface $municipalityInterface;

     /**
     * Constructor del controlador.
     *
     * Inicializa la interfaz de municipio, que es inyectada a través de la inyección de dependencias.
     *
     * @param MunicipalityInterface $municipalityInterface Interfaz para la lógica de negocio de municipios.
     */
    public function __construct(MunicipalityInterface $municipalityInterface)
    {
        parent::__construct();
        $this->municipalityInterface = $municipalityInterface;
    }

    /**
     * Crea un nuevo municipio.
     *
     * Valida los datos de la solicitud y crea un nuevo municipio utilizando la interfaz MunicipalityInterface.
     * Retorna una respuesta JSON con el municipio creado.
     *
     * @param MunicipalityRequest $request Datos validados de la solicitud para crear un municipio.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON del municipio creado.
     */
    public function store(MunicipalityRequest $request)
    {
        try
        {
            $data = $request->validated();
            $municipalityDTO = new MunicipalityDTO($data);
            $newMunicipality = $this->municipalityInterface->createNewMunicipality($municipalityDTO);
            return response()->json([
                "message" => "Municipio creado satisfactoriamente.",
                "data" => $newMunicipality,
            ], Response::HTTP_CREATED);
        }
        catch (Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

     /**
     * Lista todos los municipios.
     *
     * Retorna una lista de todos los municipios existentes en la base de datos en forma de respuesta JSON.
     *
     * @param Request $request Solicitud HTTP.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con la lista de municipios.
     */
    public function index(Request $request)
    {
        try
        {
            $queryFilterParams = $request->query();
            $municipalitiesGotDTO = $this->municipalityInterface->getAllMunicipalities($queryFilterParams);
            return response()->json([
                "data" => $municipalitiesGotDTO,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Muestra los detalles de un municipio específico.
     *
     * Recupera y retorna los detalles de un municipio dado su ID.
     *
     * @param Request $request Solicitud HTTP.
     * @param int $id Identificador del municipio.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON con los detalles del municipio.
     */
    public function show(Request $request, int $id)
    {
        try
        {
            $municipalityGotDTO = $this->municipalityInterface->getMunicipalityById($id);
            return response()->json([
                "data" => $municipalityGotDTO,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un municipio existente.
     *
     * Valida y actualiza los datos de un municipio específico identificado por su ID.
     * Retorna una respuesta JSON con los datos del municipio actualizado.
     *
     * @param MunicipalityRequest $request Datos validados de la solicitud para actualizar un municipio.
     * @param int $id Identificador del municipio a actualizar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON del municipio actualizado.
     */
    public function update(MunicipalityRequest $request, int $id)
    {
        try
        {
            $dataUpdate = $request->validated();
            $municipalityUpdate = new MunicipalityDTO($dataUpdate);
            $municipalityUpdated = $this->municipalityInterface->updateMunicipality($municipalityUpdate, $id);
            return response()->json([
                "message" => "Municipio actualizado satisfactoriamente.",
                "data" => $municipalityUpdated,
            ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un municipio.
     *
     * Elimina un municipio identificado por su ID y retorna una confirmación.
     *
     * @param Request $request Solicitud HTTP.
     * @param int $id Identificador del municipio a eliminar.
     * @return \Illuminate\Http\JsonResponse Respuesta JSON de confirmación de eliminación.
     */
    public function destroy(Request $request, int $id)
    {
        try
        {
            $municipalityDeleted = $this->municipalityInterface->deleteMunicipality($id);
            return response()->json([
                "message" => "Municipio eliminado satisfactoriamente.",
                "data" => $municipalityDeleted,
                ], Response::HTTP_OK);
        }
        catch(Exception $exception)
        {
            return $this->handleException($exception);
        }
    }
}
