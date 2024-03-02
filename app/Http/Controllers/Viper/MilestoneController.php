<?php

namespace App\Http\Controllers\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Viper\MilestoneRequest;
use App\Interfaces\Viper\MilestoneInterface;
use App\DTOs\Viper\Milestone\MilestoneDTO;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar las operaciones CRUD de los hitos en el sistema Viper.
 *
 * Este controlador maneja las solicitudes HTTP relacionadas con los hitos, permitiendo la creación,
 * actualización, obtención, listado y eliminación de estas entidades.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0 */
class MilestoneController extends BaseController
{
    /**
     * Instancia de la interfaz MilestoneInterface para interactuar con el servicio de hitos.
     *
     * @var MilestoneInterface
     */
    private MilestoneInterface $milestoneInterface;

    /**
     * Constructor de la clase MilestoneController.
     *
     * @param MilestoneInterface $milestoneInterface
     */
    public function __construct(MilestoneInterface $milestoneInterface)
    {
        parent::__construct();
        $this->milestoneInterface = $milestoneInterface;
    }

    /**
     * Almacena un nuevo hito en el sistema.
     *
     * @param MilestoneRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(MilestoneRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $milestoneDTO = new MilestoneDTO($validatedData);
            $milestoneCreatedDTO = $this->milestoneInterface->createNewMilestone($milestoneDTO);

            return response()->json([
                'message' => 'Milestone created successfully.',
                'data'    => $milestoneCreatedDTO
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un hito existente en el sistema.
     *
     * @param MilestoneRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MilestoneRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $milestoneDTO = new MilestoneDTO($validatedData);
            $stateUpdatedDTO = $this->milestoneInterface->updateMilestone($milestoneDTO, $id);

            return response()->json([
                'message' => 'Milestone updated successfully.',
                'data'    => $stateUpdatedDTO,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todos los hitos asociados a un proyecto específico en el sistema.
     *
     * @param int $projectId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $projectId)
    {
        try {
            $milestones = $this->milestoneInterface->getAllMilestonesByProject($projectId);
            return response()->json([
                'data' => $milestones,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene un hito específico por su ID.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $milestone = $this->milestoneInterface->getMilestone($id);
            return response()->json([
                'data' => $milestone,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un hito específico por su ID.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $milestoneDTO = $this->milestoneInterface->deleteMilestone($id);
            return response()->json([
                'message' => 'Milestone deleted successfully',
                'data'=> $milestoneDTO->toArray()
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
