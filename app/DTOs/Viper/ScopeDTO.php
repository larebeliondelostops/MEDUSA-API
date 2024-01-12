<?php

namespace App\DTOs\Viper;

use App\DTOs\Viper\DTO;

/**
 * Data Transfer Object (DTO) para representar un alcance (Scope) de un proyecto.
 *
 * Este DTO encapsula la estructura de datos de un alcance y se utiliza para transferir
 * información relacionada con alcances entre diferentes capas de la aplicación.
 *
 * @package App\DTOs\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ScopeDTO extends DTO
{
    /**
     * Identificador único del alcance.
     *
     * @var int
     */
    public int $id;

    /**
     * Descripción del alcance.
     *
     * @var string
     */
    public string $description;

    /**
     * Identificador único del proyecto al que pertenece el alcance (BPIN).
     *
     * @var string
     */
    public string $project_id;
}
