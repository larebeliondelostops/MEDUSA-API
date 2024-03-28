<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\MilestoneSubclassRequest;
use App\Interfaces\Modules\Viper\MilestoneSubclassInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controlador para gestionar las operaciones CRUD de las subcategorías de hitos en el sistema Viper.
 *
 * Este controlador maneja las solicitudes HTTP relacionadas con las subcategorías de hitos,
 * permitiendo la creación, actualización, obtención, listado y eliminación de estas entidades.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0 */
class MilestoneSubclassController extends BaseController
{
    /**
     * Instancia de la interfaz MilestoneSubclassInterface para interactuar con el servicio de subcategorías de hitos.
     *
     * @var MilestoneSubclassInterface
     */
    private MilestoneSubclassInterface $milestoneSubclassInterface;

    /**
     * Constructor de la clase MilestoneSubclassController.
     *
     * @param MilestoneSubclassInterface $milestoneSubclassInterface
     */
    public function __construct(MilestoneSubclassInterface $milestoneSubclassInterface)
    {
        parent::__construct();
        $this->milestoneSubclassInterface = $milestoneSubclassInterface;
    }

    /**
     * Almacena una nueva subcategoría de hito en el sistema.
     *
     * @param MilestoneSubclassRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MilestoneSubclassRequest $request)
    {
        try {
            $milestoneSubclassCreated = $this->milestoneSubclassInterface->createNewMilestoneSubclass(collect($request->validated()));

            return response()->json([
                'message' => 'Milestone Subclass created successfully.',
                'data'    => $milestoneSubclassCreated
            ], Response::HTTP_CREATED);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza una subcategoría de hito existente en el sistema.
     *
     * @param MilestoneSubclassRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MilestoneSubclassRequest $request, int $id)
    {
        try {
            $stateUpdated = $this->milestoneSubclassInterface->updateMilestoneSubclass(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Milestone Subclass updated successfully.',
                'data'    => $stateUpdated,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las subcategorías de hitos asociadas a una categoría de hito específica en el sistema.
     *
     * @param int $milestoneClassId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $milestoneClassId)
    {
        try {
            $milestoneSubclasses = $this->milestoneSubclassInterface->getAllMilestoneSubclassesByMilestoneClass($milestoneClassId);
            return response()->json([
                'data' => $milestoneSubclasses,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las subcategorías de hitos específica en el sistema.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function view()
    {
        try {
            $milestoneSubclasses = $this->milestoneSubclassInterface->getAllMilestoneSubclasses();
            return response()->json([
                'data' => $milestoneSubclasses,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene una subcategoría de hito específica por su ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $milestoneSubclass = $this->milestoneSubclassInterface->getMilestoneSubclass($id);
            return response()->json([
                'data' => $milestoneSubclass,
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina una subcategoría de hito específica por su ID.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $milestoneSubclass = $this->milestoneSubclassInterface->deleteMilestoneSubclass($id);
            return response()->json([
                'message' => 'Milestone Subclass deleted successfully',
                'data'=> $milestoneSubclass->toArray()
            ],Response::HTTP_OK);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
