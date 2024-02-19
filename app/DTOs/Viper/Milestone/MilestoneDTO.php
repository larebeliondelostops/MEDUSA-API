<?php

namespace App\DTOs\Viper\Milestone;

use App\DTOs\Viper\DTO;

/**
 * DTO (Data Transfer Object) para la entidad Milestone.
 *
 * Este DTO contiene la estructura de datos para representar un hito en el sistema Viper.
 *
 * @package App\DTOs\Viper\Milestone
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class MilestoneDTO extends DTO
{
    /**
     * Identificador único de la subclase de hito.
     *
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Identificador de la clase de hito asociada al hito.
     *
     * @var int
     */
    public int $milestone_classes_id;

    /**
     * Identificador de la subclase de hito asociada al hito.
     *
     * @var int
     */
    public int $milestone_subclasses_id;

    /**
     * Fecha del hito.
     *
     * @var string
     */
    public string $date;

    /**
     * ID del proyecto asociado al hito.
     *
     * @var string
     */
    public string $project_id;
}
