<?php

namespace App\Interfaces\Modules\Viper;

use App\DTOs\Viper\MeasurementUnit\MeasurementUnitDTO;

/**
 * Interface MeasurementUnitInterface
 *
 * Esta interfaz define los métodos que deben ser implementados por cualquier clase que actúe como servicio
 * para la manipulación de las unidades de medida de un proyecto en el sistema Viper.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

interface MeasurementUnitInterface {
    
    /**
     * Obtener todas las unidades de medida existentes.
     *
     * @return \Illuminate\Support\Collection|MeasurementUnitDTO[] Colección de objetos MeasurementUnitDTO que representan las unidades de medida.
     */
    public function getAllMeasurementUnits();

    /**
     * Almacenar una nueva unidad de medida en el sistema.
     *
     * @param  \App\DTOs\Viper\MeasurementUnit\MeasurementUnitDTO  $measurementUnitDTO Objeto MeasurementUnitDTO que contiene los datos de la nueva unidad.
     * @return \App\DTOs\Viper\MeasurementUnit\MeasurementUnitDTO Objeto MeasurementUnitDTO que representa la unidad de medida recién creada.
     */
    public function storeMeasurementUnit(MeasurementUnitDTO $measurementUnitDTO);

    /**
     * Actualizar los datos de una unidad de medida existente.
     *
     * @param  int  $measurementUnitId ID de la unidad de medida que se va a actualizar.
     * @param  \App\DTOs\Viper\MeasurementUnit\MeasurementUnitDTO  $measurementUnitDTO Objeto MeasurementUnitDTO que contiene los nuevos datos de la unidad.
     * @return \App\DTOs\Viper\MeasurementUnit\MeasurementUnitDTO Objeto MeasurementUnitDTO que representa la unidad de medida actualizada.
     * @throws \Exception Se arroja si la unidad de medida no se encuentra.
     */
    public function updateMeasurementUnit($measurementUnitId, MeasurementUnitDTO $measurementUnitDTO);

    /**
     * Eliminar una unidad de medida existente.
     *
     * @param  int  $measurementUnitId ID de la unidad de medida que se va a eliminar.
     * @return void
     * @throws \Exception Se arroja si la unidad de medida no se encuentra.
     */
    public function deleteMeasurementUnit($measurementUnitId);
    
    /**
     * Obtiene la unidad de medida existente.
     *
     * @return Collection|MeasurementUnitDTO[] Colección de objetos MeasurementUnitDTO que representan las unidades de medidas.
     */
    public function getMeasurementUnit($measurementUnitId);

}
