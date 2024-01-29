<?php

namespace App\Viper\DTOs;

/**
 * DTO (Data Transfer Object) para la entidad MilestoneSubclass.
 *
 * Este DTO contiene la estructura de datos para representar una subclase de hito en el sistema Viper.
 *
 * @package App\Viper\DTOs
 */
class MilestoneSubclassDTO
{
    /**
     * Identificador único de la subclase de hito.
     *
     * @var int
     */
    public int $id;

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
    public int $milestone_classes_id;
}
