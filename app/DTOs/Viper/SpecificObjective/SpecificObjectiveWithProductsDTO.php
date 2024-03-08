<?php

namespace App\DTOs\Viper\SpecificObjective;

use App\DTOs\Viper\DTO;

/**
 * Data Transfer Object (DTO) para representar un objetivo específico de un alcance de un proyecto.
 *
 * Este DTO encapsula la estructura de datos de un objetivo específico y se utiliza para transferir
 * información relacionada con objetivos específicos entre diferentes capas de la aplicación.
 *
 * @package App\DTOs\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class SpecificObjectiveWithProductsDTO extends DTO
{
    /**
     * Identificador único del objetivo específico.
     *
     * @var int
     */
    public ?int $id = null;

    /**
     * Descripción del objetivo específico.
     *
     * @var string
     */
    public string $description;

    public array $products;

    /**
     * Identificador único del alcance al que pertenece el objetivo específico.
     *
     * @var int
     */
    public int $scope_id;
}
