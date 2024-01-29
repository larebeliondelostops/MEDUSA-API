<?php

namespace App\Viper\DTOs;

/**
 * DTO (Data Transfer Object) para la entidad MilestoneClass.
 *
 * Este DTO contiene la estructura de datos para representar una clase de hito en el sistema Viper.
 *
 * @package App\Viper\DTOs
 */
class MilestoneClassDTO
{
    /**
     * Identificador único de la clase de hito.
     *
     * @var int
     */
    public int $id;

    /**
     * Nombre de la clase de hito.
     *
     * @var string
     */
    public string $name;
}
