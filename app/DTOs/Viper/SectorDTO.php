<?php

namespace App\DTOs\Viper;

/**
 * DTO (Data Transfer Object) para la entidad Sector.
 *
 * Este DTO contiene la estructura de datos para representar un sector en el sistema Viper.
 *
 * @package App\DTOs\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class SectorDTO extends DTO
{
    /**
     * Identificador único del sector.
     *
     * @var int|null
     */
    public ?int $id;

    /**
     * Nombre del sector.
     *
     * @var string
     */
    public string $name;
}
