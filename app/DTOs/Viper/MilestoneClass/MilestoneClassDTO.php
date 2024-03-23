<?php

namespace App\DTOs\Viper\MilestoneClass;

use App\DTOs\Viper\DTO;

/**
 * DTO (Data Transfer Object) para la entidad MilestoneClass.
 *
 * Este DTO contiene la estructura de datos para representar una clase de hito en el sistema Viper.
 *
 * @package App\DTOs\Viper\MilestoneClass
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class MilestoneClassDTO extends DTO
{
    /**
     * Identificador único de la clase de hito.
     *
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Nombre de la clase de hito.
     *
     * @var string
     */
    public string $name;
}
