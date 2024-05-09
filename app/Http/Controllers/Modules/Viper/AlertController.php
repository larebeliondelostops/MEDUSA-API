<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Controllers\Controller;
use App\Http\Request\Modules\Viper\AlertRequest;
use App\Interfaces\Modules\Viper\AlertInterface;
use Exception;
use Illuminate\Http\Request;

/**
 * Controlador para la entidad Alerta en el sistema Viper.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class AlertController extends BaseController
{
    /**
     * @var AlertInterface
     */
    private AlertInterface $alertInterface;

    /**
     * Constructor del controlador.
     *
     * @param AlertInterface $alertInterface
     */
    public function __construct(AlertInterface $alertInterface)
    {
        parent::__construct();
        $this->alertInterface = $alertInterface;
    }

    /**
     * Almacena una nueva alerta.
     *
     * @param AlertRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AlertRequest $request)
    {
        try {
            $alertCreated = $this->alertInterface->createNewAlert(collect($request->validated()));

            return response()->json([
                'message' => 'Alert created successfully.',
                'data'    => $alertCreated
            ], 201);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualiza una alerta existente.
     *
     * @param AlertRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(AlertRequest $request, int $id)
    {
        try {
            $alertUpdated = $this->alertInterface->updateAlert(collect($request->validated()), $id);

            return response()->json([
                'message' => 'Alert updated successfully.',
                'data'    => $alertUpdated,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las alertas asociadas a un indicador.
     *
     * @param int $indicatorId
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $indicatorId)
    {
        try {
            $alerts = $this->alertInterface->getAllAlertsByIndicator($indicatorId);
            return response()->json([
                'data' => $alerts,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las alertas asociadas a un projecto.
     *
     * @param int $indicatorId
     * @return \Illuminate\Http\JsonResponse
     */
    public function view(int $projectId)
    {
        try {
            $alerts = $this->alertInterface->getAllAlertsByProject($projectId);
            return response()->json([
                'data' => $alerts,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las alertas asociadas a un usuario especifico.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function unveil()
    {
        try {
            $alerts = $this->alertInterface->getAlertsByUser();
            return response()->json([
                'data' => $alerts,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las alertas.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function display()
    {
        try {
            $alerts = $this->alertInterface->getAllAlerts();
            return response()->json([
                'data' => $alerts,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene todas las alertas de un usuario.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function discover()
    {
        try {
            $alerts = $this->alertInterface->getAllAlertsByUser();
            return response()->json([
                'data' => $alerts,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Obtiene los detalles de una alerta específica.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        try {
            $alerts = $this->alertInterface->getAlert($id);
            return response()->json([
                'data' => $alerts,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina logicamente una alerta.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, int $id)
    {
        try {
            $alert = $this->alertInterface->deleteAlert($id);
            return response()->json([
                'message' => 'Alert deleted successfully',
                'data'=> $alert
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina logicamente una alerta.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDestroy(Request $request, int $id)
    {
        try {
            $alert = $this->alertInterface->forceDeleteAlert($id);
            return response()->json([
                'message' => 'Alert force deleted successfully',
                'data'=> $alert
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Elimina logicamente una alerta.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function recover(Request $request, int $id)
    {
        try {
            $alert = $this->alertInterface->recoverAlert($id);
            return response()->json([
                'message' => 'Alert recover successfully',
                'data'=> $alert
            ],200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
