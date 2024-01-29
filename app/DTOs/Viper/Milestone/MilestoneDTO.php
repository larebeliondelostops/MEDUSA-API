<?php

namespace App\Viper\DTOs;

/**
 * DTO (Data Transfer Object) para la entidad Milestone.
 *
 * Este DTO contiene la estructura de datos para representar un hito en el sistema Viper.
 *
 * @package App\Viper\DTOs
 */
class MilestoneDTO
{
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
