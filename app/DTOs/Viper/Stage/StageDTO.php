<?php

namespace App\DTOs\Viper\Stage;

use App\DTOs\Viper\DTO;

/**
 * Clase StageDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de una etapa en un proyecto en el sistema Viper.
 *
 * @package App\DTOs\Viper
 */
class StageDTO extends DTO
{
    /**
     * @param string $name Nombre de la Etapa.
     */
    public ?int $id = null;
    public string $name;
}

