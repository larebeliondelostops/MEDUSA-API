<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\ImprovementPlanRequest;
use App\Interfaces\Modules\Viper\ImprovementPlanInterface;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador para la entidad Plane de mejora en el sistema Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ImprovementPlanController extends BaseController
{
    /**
     * @var ImprovementPlanInterface
     */
    private ImprovementPlanInterface $improvementPlanInterface;

    /**
     * Constructor del controlador.
     *
     * @param ImprovementPlanInterface $improvementPlanInterface
     */
    public function __construct(ImprovementPlanInterface $improvementPlanInterface)
    {
        parent::__construct();
        $this->improvementPlanInterface = $improvementPlanInterface;
    }

    /**
     * Almacena un nuevo plan de mejora.
     *
     * @param ImprovementPlanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ImprovementPlanRequest $request)
    {
        try {
            $improvementPlanCreated = $this->improvementPlanInterface->createNewImprovementPlan(collect($request->validated()));

            return response()->json([
                'message' => 'Improvement Plan created successfully.',
                'data'    => $improvementPlanCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza un plan de mejora existente.
     *
     * @param ImprovementPlanRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ImprovementPlanRequest $request, int $id)
    {
        try {
            $improvementPlanUpdated = $this->improvementPlanInterface->updateImprovementPlan(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Improvement Plan updated successfully.',
                'data'    => $improvementPlanUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene el plan de mejora asociado a una alerta.
     *
     * @param int $alertId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $alertId)
    {
        try {
            $improvementPlan = $this->improvementPlanInterface->getImprovementPlanByAlert($alertId);
            return response()->json([
                'data' => $improvementPlan,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene los detalles de un plan de mejora específica.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $improvementPlan = $this->improvementPlanInterface->getImprovementPlan($id);
            return response()->json([
                'data' => $improvementPlan,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina un plan de mejora.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $improvementPlan = $this->improvementPlanInterface->deleteImprovementPlan($id);
            return response()->json([
                'message' => 'Improvement Plan deleted successfully',
                'data'=> $improvementPlan
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
