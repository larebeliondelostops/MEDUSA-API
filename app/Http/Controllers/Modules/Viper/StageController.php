<?php

namespace App\Http\Controllers\Modules\Viper;

use Illuminate\Http\Request;
use App\Http\Request\Viper\StageRequest;
use App\Http\Controllers\Controller;
use App\Interfaces\Modules\Viper\StageInterface;

/**
 * Controlador que maneja todo lo que tiene que ver con las etapas de un proyecto
 *
 * Controlador que maneja la logica para la creacion, actualizacion, eliminacion y consulta de las carpetas en los proyectos de Viper
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */

class StageController extends BaseController
{
    private StageInterface $stageInterface;

    public function __construct(StageInterface $stageInterface)
    {
        parent::__construct();

        $this->stageInterface = $stageInterface;
    }

    /**
     * Mostrar una lista de etapas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $stages = $this->stageInterface->getAllStages();

            return response()->json([
                'data' => $stages,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar una nueva etapa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageRequest $request)
    {
        try {
            $newStage = $this->stageInterface->storeStage(collect($request->validated()));

            return response()->json([
                'message' => 'Stage created successfully.',
                'data' => $newStage,
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Actualizar el nombre de una etapa especificada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $StageId
     * @return \Illuminate\Http\Response
     */
    public function update(StageRequest $request, int $stageId)
    {
        try {
            $updatedStage = $this->stageInterface->updateStage($stageId, collect($request->validated()));

            return response()->json([
                'message' => 'Etapa actualizada correctamente',
                'data' => $updatedStage,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Eliminar el recurso especificado del almacenamiento.
     *
     * @param  int  $StageId
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $stageId)
    {
        try {
            $this->stageInterface->deleteStage($stageId);
            return response()->json([
                'message' => 'Etapa eliminada correctamente'
            ]);
            
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
