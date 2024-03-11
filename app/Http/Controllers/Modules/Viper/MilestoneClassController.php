<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\MilestoneClassRequest;
use App\Interfaces\Modules\Viper\MilestoneClassInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controlador para gestionar las operaciones CRUD de las clases de hitos en el sistema Viper.
 *
 * Este controlador maneja las solicitudes HTTP relacionadas con las clases de hitos, permitiendo la creación,
 * actualización, obtención, listado y eliminación de estas entidades.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0 */
class MilestoneClassController extends BaseController
{
    /**
     * Instancia de la interfaz MilestoneClassInterface para interactuar con el servicio de clases de hitos.
     *
     * @var MilestoneClassInterface
     */
    private MilestoneClassInterface $milestoneClassInterface;

    /**
     * Constructor de la clase MilestoneClassController.
     *
     * @param MilestoneClassInterface $milestoneClassInterface
     */
    public function __construct(MilestoneClassInterface $milestoneClassInterface)
    {
        parent::__construct();
        $this->milestoneClassInterface = $milestoneClassInterface;
    }

    /**
     * Almacena una nueva clase de hitos en el sistema.
     *
     * @param MilestoneClassRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MilestoneClassRequest $request)
    {
        try {
            $milestoneClassCreated = $this->milestoneClassInterface->createNewMilestoneClass(collect($request->validated()));

            return response()->json([
                'message' => 'Milestone Class created successfully.',
                'data'    => $milestoneClassCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza una clase de hitos existente en el sistema.
     *
     * @param MilestoneClassRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MilestoneClassRequest $request, int $id)
    {
        try {
            $stateUpdated = $this->milestoneClassInterface->updateMilestoneClass(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Milestone Class updated successfully.',
                'data'    => $stateUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las clases de hitos en el sistema.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $milestoneClasses = $this->milestoneClassInterface->getAllMilestoneClasses();
            return response()->json([
                'data' => $milestoneClasses,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene una clase de hitos específica por su ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $milestoneClass = $this->milestoneClassInterface->getMilestoneClass($id);
            return response()->json([
                'data' => $milestoneClass,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina una clase de hitos específica por su ID.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $milestoneClass = $this->milestoneClassInterface->deleteMilestoneClass($id);
            return response()->json([
                'message' => 'Milestone Class deleted successfully',
                'data'=> $milestoneClass
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
