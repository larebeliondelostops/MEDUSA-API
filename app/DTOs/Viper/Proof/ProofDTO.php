<?php

namespace App\DTOs\Viper\Proof;

use App\DTOs\Viper\DTO;

/**
 * DTO (Data Transfer Object) para la entidad Proof.
 *
 * Este DTO contiene la estructura de datos para representar una prueba en el sistema Viper.
 *
 * @package App\DTOs\Viper\Proof
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ProofDTO extends DTO
{
    /**
     * Identificador único de la prueba.
     *
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Nombre de la prueba.
     *
     * @var string|null
     */
    public ?string $name = null;

    /**
     * URL de la prueba.
     *
     * @var string|null
     */
    public ?string $url = null;

    /**
     * Responsable de la prueba.
     *
     * @var string
     */
    public string $responsible;

    /**
     * Identificador del reporte asociada a la prueba.
     *
     * @var int
     */
    public int $report_id;
}
