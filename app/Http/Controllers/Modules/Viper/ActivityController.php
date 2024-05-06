<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Request\Modules\Viper\ActivityRequest;
use App\Interfaces\Modules\Viper\ActivityInterface;
use Illuminate\Http\Response; 
/**
 * Controlador que maneja todo lo relacionado con las actividades de un proyecto en Viper.
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */

class ActivityController extends BaseController
{
    private ActivityInterface $activityInterface;

    public function __construct(ActivityInterface $activityInterface)
    {
        parent::__construct();
        $this->activityInterface = $activityInterface;
    }

    /**
     * Mostrar una lista de actividades.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $deliverableId)
    {
        try {
            $activities = $this->activityInterface->getAllActivities($deliverableId);

            return response()->json([
                'data' => $activities,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar una nueva actividad.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        try {
            $newActivity = $this->activityInterface->storeActivity(collect($request->validated()));

            return response()->json([
                'message' => 'Actividad creada correctamente',
                'data' => $newActivity,
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Actualizar los detalles de una actividad.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $activityId
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, $activityId)
    {
        try {
            $updatedActivity = $this->activityInterface->updateActivity($activityId,collect($request->validated()));

            return response()->json([
                'message' => 'Actividad actualizada correctamente',
                'data' => $updatedActivity,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    public function display($productId)
    {
        try {
            $activities = $this->activityInterface->getActivityByProductoWithReportNull($productId);
            return response()->json([
                'data' => $activities,
            ], 200);
        } catch (Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Mostrar detalles de una actividad específica.
     *
     * @param  int  $activityId
     * @return \Illuminate\Http\Response
     */
    public function show($activityId)
    {
        try {
            $activity = $this->activityInterface->getActivity($activityId);
            return response()->json([
                'data' => $activity,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Eliminar una actividad específica.
     *
     * @param  int  $activityId
     * @return \Illuminate\Http\Response
     */
    public function destroy($activityId)
    {
        try {
            $this->activityInterface->deleteActivity($activityId);
            return response()->json(
                ['message' => 'Actividad eliminada correctamente']
            );
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
