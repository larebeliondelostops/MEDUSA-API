<?php

namespace App\DTOs\Viper\Alert;

use App\DTOs\Viper\DTO;

/**
 * DTO (Data Transfer Object) para la entidad Alerta.
 *
 * Este DTO contiene la estructura de datos para representar una alerta en el sistema Viper.
 *
 * @package App\DTOs\Viper\Alert
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class AlertDTO extends DTO
{
    /**
     * Identificador único del alerta.
     *
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Tipo de alerta.
     *
     * @var string
     */
    public string $type;

    /**
     * Estado de la alerta.
     *
     * @var string
     */
    public string $state;

    /**
     * Descripción de la alerta.
     *
     * @var string
     */
    public string $description;

    /**
     * Fecha de la alerta.
     *
     * @var string
     */
    public string $date;

    /**
     * Identificador del indicador asociado a la alerta.
     *
     * @var int
     */
    public int $indicator_id;
}
