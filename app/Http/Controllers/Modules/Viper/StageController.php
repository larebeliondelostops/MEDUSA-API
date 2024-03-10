<?php

namespace App\Http\Controllers\Modules\Viper;

use Illuminate\Http\Request;
use App\Http\Request\Viper\StageRequest;
use App\Http\Controllers\Controller;
use App\DTOs\Viper\Stage\StageDTO;
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
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
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
            // Valida y procesa los datos del formulario
            $validatedData = $request->validated();

            // Crea un nuevo StageDTO con los datos del formulario
            $stageDTO = new StageDTO($validatedData);

            // Llama al servicio para almacenar la nueva etapa
            $newStage = $this->stageInterface->storeStage($stageDTO);

            // Retorna la respuesta JSON con la nueva etapa creada
            return response()->json([
                'message' => 'Etapa creada correctamente',
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
    public function update(StageRequest $request, $stageId)
    {
        try {
            // Valida y procesa los datos del formulario
            $validatedData = $request->validated();

            // Crea un nuevo StageDTO con los datos actualizados
            $stageDTO = new StageDTO($validatedData);

            // Llama al servicio para actualizar la etapa
            $updatedStage = $this->stageInterface->updateStage($stageId, $stageDTO);

            // Retorna la respuesta JSON con la etapa actualizada
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
    public function destroy($stageId)
    {
        try {
            // Llama al servicio para eliminar la etapa
            $this->stageInterface->deleteStage($stageId);
            return response()->json(
                ['message' => 'Etapa eliminada correctamente']
            );
            
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
