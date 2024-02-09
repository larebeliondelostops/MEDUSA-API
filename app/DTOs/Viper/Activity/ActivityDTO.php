<?php

namespace App\DTOs\Viper\Activity;

use App\DTOs\Viper\DTO;

/**
 * Clase ActivityDTO
 *
 * Un objeto de transferencia de datos (DTO) que representa la información de una actividad en el sistema Viper.
 *
 * @package App\DTOs\Viper\Activity
 */
class ActivityDTO extends DTO
{
    /**
     * @param string $description Descripción de la actividad.
     * @param float $total_quantity Cantidad total.
     * @param float $optimistic_time Tiempo optimista.
     * @param float $most_likely_time Tiempo más probable.
     * @param float $pessimistic_time Tiempo pesimista.
     * @param float $estimated_time Tiempo estimado.
     * @param float $total_value Valor total.
     * @param bool $in_kind_contribution Contribución en especie.
     * @param string $start_date Fecha de inicio.
     * @param string $end_date Fecha de finalización.
     * @param int $deliverable_id ID del entregable asociado.
     * @param int $folder_id ID de la carpeta asociada.
     * @param int $measurement_unit_id ID de la unidad de medida asociada.
     */
    public ?int $id = null;
    public string $description;
    public float $total_quantity;
    public float $optimistic_time;
    public float $most_likely_time;
    public float $pessimistic_time;
    public ?float $estimated_time = null;
    public float $total_value;
    public bool $in_kind_contribution;
    public string $start_date;
    public string $end_date;
    public int $deliverable_id;
    public ?int $folder_id = null;
    public int $measurement_unit_id;
    public ?int $number = null;
}
