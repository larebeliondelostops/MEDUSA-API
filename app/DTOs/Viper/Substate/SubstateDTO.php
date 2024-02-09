<?php

namespace App\DTOs\Viper\Substate;

use App\DTOs\Viper\DTO;

/**
 * Clase SubstateDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de un subestado en un proyecto en el sistema Viper.
 *
 * @package App\DTOs\Viper
 */
class SubstateDTO extends DTO
{
    /**
     * @param string $name Nombre del subestado.
     */
    public ?int $id = null;
    public string $name;
    public int $state_id;
}

