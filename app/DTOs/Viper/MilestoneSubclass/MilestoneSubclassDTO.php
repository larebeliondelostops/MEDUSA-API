<?php

namespace App\DTOs\Viper\MilestoneSubclass;

use App\DTOs\Viper\DTO;

/**
 * DTO (Data Transfer Object) para la entidad MilestoneSubclass.
 *
 * Este DTO contiene la estructura de datos para representar una subclase de hito en el sistema Viper.
 *
 * @package App\DTOs\Viper\MilestoneSubclass
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class MilestoneSubclassDTO extends DTO
{
    /**
     * Identificador único de hito.
     *
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Nombre de la subclase de hito.
     *
     * @var string
     */
    public string $name;

    /**
     * Identificador de la clase de hito asociada a la subclase de hito.
     *
     * @var int
     */
    public int $milestone_class_id;
}
