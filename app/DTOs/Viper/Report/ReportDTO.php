<?php

namespace App\DTOs\Viper\Report;

use App\DTOs\Viper\DTO;

/**
 * Data Transfer Object (DTO) para representar un reporte (Report) de un proyecto.
 *
 * Este DTO encapsula la estructura de datos de un alcance y se utiliza para transferir
 * información relacionada con reportes entre diferentes capas de la aplicación.
 *
 * @package App\DTOs\Viper\Report
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ReportDTO extends DTO
{
    /**
     * Identificador único del reporte.
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
     * Fecha del reporte.
     *
     * @var string
     */
    public string $date;

    /**
     * Identificador del proyecto asociado al reporte.
     *
     * @var int
     */
    public int $project_id;

    /**
     * Identificador del documento asociado al reporte.
     *
     * @var int
     */
    public int $document_id;
}
