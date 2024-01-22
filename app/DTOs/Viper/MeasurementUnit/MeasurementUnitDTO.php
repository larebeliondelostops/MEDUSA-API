<?php

namespace App\DTOs\Viper\MeasurementUnit;

use App\DTOs\Viper\DTO;

/**
 * Clase MeasurementUnitDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de una unidad de medida en el sistema Viper.
 *
 * @package App\DTOs\Viper
 */
class MeasurementUnitDTO extends DTO
{
    /**
     * @param string $name Nombre de la unidad de medida.
     */
    public ?int $id = null;
    public string $name;
}