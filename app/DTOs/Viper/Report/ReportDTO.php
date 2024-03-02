<?php

namespace App\DTOs\Viper\Report;

use App\DTOs\Viper\DTO;
/**
 * DTO (Data Transfer Object) para la entidad Report.
 *
 * Este DTO contiene la estructura de datos para representar un reporte en el sistema Viper.
 *
 * @package App\DTOs\Viper\Report
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ReportDTO extends DTO
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
}
