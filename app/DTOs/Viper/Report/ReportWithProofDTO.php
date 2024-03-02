<?php

namespace App\DTOs\Viper\Report;

use App\DTOs\Viper\DTO;
use App\DtoS\Viper\Proof\ProofDTO;
/**
 * DTO (Data Transfer Object) para la entidad Report.
 *
 * Este DTO contiene la estructura de datos para representar un reporte con sus pruebas en el sistema Viper.
 *
 * @package App\DTOs\Viper\Report
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ReportWithProofDTO extends DTO
{
    /**
     * Identificador único de la reporte.
     *
     * @var int|null
     */
    public ?int $id = null;

    /**
     * Nombre del reporte.
     *
     * @var string
     */
    public string $name;

    /**
     * Descripción del reporte.
     *
     * @var string
     */
    public string $description;

    /**
     * Persona responsable del reporte.
     *
     * @var string
     */
    public string $responsible;

    /**
     * Fecha del reporte.
     *
     * @var string
     */
    public string $date;

    /**
     * ID del producto asociado al reporte.
     *
     * @var int
     */
    public int $product_id;

    /**
     * Pruebas de un reporte.
     *
     * @var array
     */
    public array $proofs;
}
