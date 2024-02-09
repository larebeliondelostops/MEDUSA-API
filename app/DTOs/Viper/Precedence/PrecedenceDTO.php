<?php

namespace App\DTOs\Viper\Precedence;

use App\DTOs\Viper\DTO;

/**
 * Clase PrecedenceDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de una precedencia en el sistema Viper.
 *
 * @package App\DTOs\Viper\Activity
 */
class PrecedenceDTO extends DTO
{
    /**
     * @param string $type Tipo de precedencia.
     * @param string $delay_time Tiempo de retraso.
     * @param int $higher_id ID de la actividad de mayor precedencia.
     * @param int $lower_id ID de la actividad de menor precedencia.
     */
    public ?int $id = null;
    public string $type;
    public string $delay_time;
    public int $higher_id;
    public int $lower_id;
}
