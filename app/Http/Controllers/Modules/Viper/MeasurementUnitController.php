<?php

namespace App\Http\Controllers\Modules\Viper;

use App\Http\Request\Viper\MeasurementUnitRequest;
use App\Interfaces\Modules\Viper\MeasurementUnitInterface;

/**
 * Controlador que maneja todo lo que tiene que ver con las unidades de medida de un proyecto
 *
 * Controlador que maneja la logica para la creacion, actualizacion, eliminacion y consulta de las carpetas en los proyectos de Viper
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */

class MeasurementUnitController extends BaseController
{
    private MeasurementUnitInterface $measurementUnitInterface;

    public function __construct(MeasurementUnitInterface $measurementUnitInterface)
    {
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
        $this->measurementUnitInterface = $measurementUnitInterface;
    }

     /**
     * Mostrar una lista de unidades de medida.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $queryParam = request()->query();
            $measurementUnits = $this->measurementUnitInterface->getAllMeasurementUnits($queryParam);

            return response()->json([
                'data' => $measurementUnits,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar una nueva unidad de medida.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeasurementUnitRequest $request)
    {
        try {
            $newMeasurementUnit = $this->measurementUnitInterface->storeMeasurementUnit(collect($request->validated()));

            return response()->json([
                'message' => 'unidad de medida creada correctamente',
                'data' => $newMeasurementUnit,
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Actualizar el nombre de una unidad de medida especificada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $measurementUnitId
     * @return \Illuminate\Http\Response
     */
    public function update(MeasurementUnitRequest $request, $measurementUnitId)
    {
        try {
            $updatedMeasurementUnit = $this->measurementUnitInterface->updateMeasurementUnit($measurementUnitId,collect($request->validated()));

            // Retorna la respuesta JSON con la unidad de medida actualizada
            return response()->json([
                'message' => 'unidad de medida actualizada correctamente',
                'data' => $updatedMeasurementUnit,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Mostrar una lista de unidades de medida.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $measurementUnitId
     * @return \Illuminate\Http\Response
     */
    public function show($measurementUnitId)
    {
        try {
            $measurementUnit = $this->measurementUnitInterface->getMeasurementUnit($measurementUnitId);
            // Retorna la respuesta JSON con la unidad de medida actualizada
            return response()->json([
                'data' => $measurementUnit,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Eliminar el recurso especificado del almacenamiento.
     *
     * @param  int  $measurementUnitId
     * @return \Illuminate\Http\Response
     */
    public function destroy($measurementUnitId)
    {
        try {
            // Llama al servicio para eliminar la unidad de medida
            $this->measurementUnitInterface->deleteMeasurementUnit($measurementUnitId);
            return response()->json(
                ['message' => 'unidad de medida eliminada correctamente']
            );
            
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
