<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

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
     * @return Collection Colección de Collections que representan las unidades de medida.
     */
    public function getAllMeasurementUnits(): Collection;

    /**
     * Almacenar una nueva unidad de medida en el sistema.
     *
     * @param Collection Collection que contiene los datos de la nueva unidad.
     * @return Collection Collection que representa la unidad de medida recién creada.
     */
    public function storeMeasurementUnit( Collection $measurementUnit): Collection;

    /**
     * Actualizar los datos de una unidad de medida existente.
     *
     * @param int $measurementUnitId ID de la unidad de medida que se va a actualizar.
     * @param Collection Collection que contiene los nuevos datos de la unidad.
     * @return Collection Collection que representa la unidad de medida actualizada.
     */
    public function updateMeasurementUnit(int $measurementUnitId, Collection $measurementUnit): Collection;

    /**
     * Eliminar una unidad de medida existente.
     *
     * @param  int  $measurementUnitId ID de la unidad de medida que se va a eliminar.
     * @return Collection Collection que representa la unidad de medida eliminada.
     */
    public function deleteMeasurementUnit(int $measurementUnitId);
    
    /**
     * Obtiene la unidad de medida existente.
     *
     * @return Collection Colección de Collection que representan las unidades de medidas.
     */
    public function getMeasurementUnit(int $measurementUnitId): Collection;
}
