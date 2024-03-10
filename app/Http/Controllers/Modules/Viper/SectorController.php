<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\SectorRequest;
use App\Interfaces\Modules\Viper\SectorInterface;
use App\DTOs\Viper\Sector\SectorDTO;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador para la gestión de sectores en la aplicación Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class SectorController extends BaseController
{
    /**
     * Interfaz para interactuar con la lógica de negocios de los sectores.
     *
     * @var SectorInterface
     */
    private SectorInterface $sectorInterface;

    /**
     * Constructor del controlador.
     *
     * @param SectorInterface $sectorInterface Interfaz para interactuar con la lógica de negocios de los sectores.
     */
    public function __construct(SectorInterface $sectorInterface)
    {
        parent::__construct();
        $this->sectorInterface = $sectorInterface;
    }

    /**
     * Almacena un nuevo sector en la base de datos.
     *
     * @param SectorRequest $request Solicitud de creación del sector.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SectorRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $sectorDTO = new SectorDTO($validatedData);
            $sectorCreatedDTO = $this->sectorInterface->createNewSector($sectorDTO);

            return response()->json([
                'message' => 'Sector created successfully.',
                'data'    => $sectorCreatedDTO
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un sector existente en la base de datos.
     *
     * @param SectorRequest $request Solicitud de actualización del sector.
     * @param int $id Identificador único del sector a actualizar.
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SectorRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $sectorDTO = new SectorDTO($validatedData);
            $stateUpdatedDTO = $this->sectorInterface->updateSector($sectorDTO, $id);

            return response()->json([
                'message' => 'Sector updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todos los sectores disponibles en la base de datos.
     *
     * @param Request $request Solicitud de obtención de sectores.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $sectors = $this->sectorInterface->getAllSectors();
            return response()->json([
                'data' => $sectors,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un sector existente en la base de datos.
     *
     * @param Request $request Solicitud de eliminación del sector.
     * @param int $id Identificador único del sector a eliminar.
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $sectorDTO = $this->sectorInterface->deleteSector($id);
            return response()->json($sectorDTO->toArray(), 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
