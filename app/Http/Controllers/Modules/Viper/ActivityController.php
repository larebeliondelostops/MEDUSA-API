<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Request\Viper\ActivityRequest;
use App\DTOs\Viper\Activity\ActivityDTO;
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
            $validatedData = $request->validated();
            $activityDTO = new ActivityDTO($validatedData);
            $newActivity = $this->activityInterface->storeActivity($activityDTO);

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
            $validatedData = $request->validated();
            $activityDTO = new ActivityDTO($validatedData);
            $updatedActivity = $this->activityInterface->updateActivity($activityId, $activityDTO);

            return response()->json([
                'message' => 'Actividad actualizada correctamente',
                'data' => $updatedActivity,
            ], 200);
        } catch (\Exception $exception) {
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
