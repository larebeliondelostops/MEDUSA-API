<?php

namespace App\DTOs\Viper\Indicator;

use App\DTOs\Viper\DTO;

/**
 * DTO (Data Transfer Object) para la entidad Indicador.
 *
 * Este DTO contiene la estructura de datos para representar un indicador en el sistema Viper.
 *
 * @package App\DTOs\Indicator\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class IndicatorDTO extends DTO
{
    /**
     * Identificador único del indicador.
     *
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Nombre del indicador.
     *
     * @var string
     */
    public string $name;

    /**
     * Año de inicio de la meta del indicador.
     *
     * @var int
     */
    public int $start_year_of_goal;

    /**
     * Año de finalización de la meta del indicador.
     *
     * @var int
     */
    public int $end_year_goal;

    /**
     * Unidad de medida del indicador.
     *
     * @var string
     */
    public string $unit;

    /**
     * Valor objetivo del indicador.
     *
     * @var int
     */
    public int $target_value;

    /**
     * Progreso actual del indicador.
     *
     * @var int
     */
    public int $progress;

    /**
     * Porcentaje completado del indicador.
     *
     * @var float
     */
    public float $percentage_completed;

    /**
     * Indica si el indicador es principal.
     *
     * @var bool
     */
    public bool $is_main;

    /**
     * Identificador del producto asociado al indicador.
     *
     * @var int
     */
    public int $product_id;
}