<?php

namespace App\DTOs\Viper\Substate;

use App\DTOs\Viper\DTO;
use App\DTOs\Viper\State\StateDTO;

/**
 * Clase SubstateDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de un subestado en un proyecto en el sistema Viper.
 *
 * @package App\DTOs\Viper
 */
class SubstateDetailDTO extends DTO
{
    /**
     * @param string $name Nombre del subestado.
     */
    public ?int $id = null;
    public string $name;
    public StateDTO $state;
}

