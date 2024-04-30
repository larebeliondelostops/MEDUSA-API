<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interfaz para la manipulación de reportes en el sistema Viper.
 *
 * Esta interfaz define los métodos necesarios para crear, actualizar, recuperar y eliminar reportes en el sistema.
 *
 * @package App\Http\Controllers\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
interface ReportInterface
{
    /**
     * Crea un nuevo reporte en el sistema.
     *
     * @param Collection $report Collection que contiene la informacion del reporte a crear.
     * @return Collection Collection del reporte creado.
     */
    public function createNewReport(Collection $report): Collection;

    /**
     * Actualiza un reporte existente en el sistema.
     *
     * @param Collection $report Collection que contiene la información actualizada del reporte.
     * @param int $id identificador del reporte a actualizar.
     * @return Collection Collection del reporte actualizado.
     */
    public function updateReport(Collection $report, int $id): Collection;
    
    /**
     * Obtiene todos los reportes asociados a un actividad en el sistema.
     *
     * @param int $activityId identificador de la actividad.
     * @return Collection Collection de Collections de asociados a reportes.
     */
    public function getReportByActivity(int $activityId): Collection;

    /**
     * Obtiene todos los reportes asociados a una actividad con su reportes incluidos en el sistema.
     *
     * @param int $activityId identifiador de la actividad.
     * @return Collection Collection de Collections de asociados a reportes.
     */
    public function getReportByActivityWithProof(int $activityId): Collection;

    /**
     * Obtiene un reporte específico del sistema por su identificador único.
     *
     * @param int $id identificador único del reporte.
     * @return Collection Collection del reporte encontrado.
     */
    public function getReport(int $id): Collection;

    /**
     * Elimina un reporte del sistema por su identificador único.
     *
     * @param int $id identificador único del reporte a eliminar.
     * @return Collection Collection del reporte eliminado.
     */
    public function deleteReport(int $id): Collection;
}
