<?php

namespace App\Http\Controllers\Viper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DTOs\Viper\Substate\SubstateDTO;
use App\Interfaces\Viper\SubstateInterface;

/**
 * Controlador que maneja todo lo que tiene que ver con las subestados de un proyecto
 *
 * Controlador que maneja la logica para la creacion, actualizacion, eliminacion y consulta de las carpetas en los proyectos de Viper
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */

class SubstateController extends BaseController
{
    private SubstateInterface $substateInterface;

    public function __construct(SubstateInterface $substateInterface)
    {
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
        $this->substateInterface = $substateInterface;
    }

     /**
     * Mostrar una lista de subestados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $substates = $this->substateInterface->getAllSubstates();

            return response()->json([
                'data' => $substates,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar un nuevo subestado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Valida y procesa los datos del formulario
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'state_id' => 'required|integer',
            ]);

            // Crea un nuevo SubstateDTO con los datos del formulario
            $substateDTO = new SubstateDTO($validatedData);

            // Llama al servicio para almacenar la nueva etapa
            $newSubstate = $this->substateInterface->storeSubstate($substateDTO);

            // Retorna la respuesta JSON con la nueva etapa creada
            return response()->json([
                'message' => 'Etapa creada correctamente',
                'data' => $newSubstate,
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Actualizar el nombre de un subestado especificada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $SubstateId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $substateId)
    {
        try {
            // Valida y procesa los datos del formulario
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Crea un nuevo SubstateDTO con los datos actualizados
            $substateDTO = new SubstateDTO($validatedData);

            // Llama al servicio para actualizar la etapa
            $updatedSubstate = $this->substateInterface->updateSubstate($substateId, $substateDTO);

            // Retorna la respuesta JSON con la etapa actualizada
            return response()->json([
                'message' => 'Etapa actualizada correctamente',
                'data' => $updatedSubstate,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Eliminar el recurso especificado del almacenamiento.
     *
     * @param  int  $SubstateId
     * @return \Illuminate\Http\Response
     */
    public function destroy($substateId)
    {
        try {
            // Llama al servicio para eliminar la etapa
            $this->substateInterface->deleteSubstate($substateId);
            return response()->json(
                ['message' => 'Etapa eliminada correctamente']
            );
            
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Mostrar una lista de subestados por estado.
     *
     * @return \Illuminate\Http\Response
     */
    public function listByState(int $sateId)
    {
        try {
            $substates = $this->substateInterface->getAllSubstatesByState($sateId);

            return response()->json([
                'data' => $substates->toArray(['state_id']),
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
