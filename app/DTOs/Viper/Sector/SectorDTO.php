<?php

namespace App\DTOs\Viper\Sector;

use App\DTOs\Viper\DTO;

/**
 * DTO (Data Transfer Object) para la entidad Sector.
 *
 * Este DTO contiene la estructura de datos para representar un sector en el sistema Viper.
 *
 * @package App\DTOs\Viper\Sector
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
    public ?int $id = null;

    /**
     * Nombre del sector.
     *
     * @var string
     */
    public string $name;
}
