<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Report\ReportDTO;
use App\Interfaces\Viper\ReportInterface;
use App\Models\Viper\Report;

/**
 * Servicio que gestiona las operaciones relacionadas con los reportes (Reports) en el sistema Viper.
 *
 * Este servicio implementa la interfaz ReportInterface y proporciona la lógica de negocio
 * para la creación, actualización, obtención y eliminación de reportes.
 *
 * @package App\Services\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
class ReportService implements ReportInterface
{
    /**
     * Crea un nuevo reporte.
     *
     * @param ReportDTO $reportDTO Datos del reporte a crear.
     * @return ReportDTO Datos del reporte creado.
     */
    public function createNewReport(ReportDTO $reportDTO): ReportDTO
    {
        $report = new Report();
        $report->fill($reportDTO->toArray());
        $report->save();

        return new ReportDTO($report->toArray());
    }

    /**
     * Actualiza un reporte existente.
     *
     * @param ReportDTO $reportDTO Datos del reporte actualizado.
     * @param int $id Identificador único del reporte a actualizar.
     * @return ReportDTO Datos del reporte actualizado.
     */
    public function updateReport(ReportDTO $reportDTO, int $id): ReportDTO
    {
        $report = Report::findOrFail($id);
        $report->fill($reportDTO->toArray());
        $report->save();

        return new ReportDTO($report->toArray());
    }

    /**
     * Obtiene todos los reportes asociados a un proyecto.
     *
     * @param string $projectBpin BPIN del proyecto.
     * @return array Array de objetos ReportDTO que representan los reportes asociados al proyecto.
     */
    public function getAllReportByProject(string $projectBpin): array
    {
        $reports = Report::where('project_id', $projectBpin)->get();

        $reportDTOs = $reports->map(function ($report) {
            return new ReportDTO($report->toArray());
        })->all();

        return $reportDTOs;
    }

    /**
     * Obtiene un reporte específico por su identificador único.
     *
     * @param string $id Identificador único del reporte.
     * @return ReportDTO Datos del reporte encontrado.
     */
    public function getReport(string $id): ReportDTO
    {
        $report = Report::find($id);

        return new ReportDTO($report->toArray());
    }

    /**
     * Elimina un reporte existente por su identificador único.
     *
     * @param int $id Identificador único del reporte a eliminar.
     * @return ReportDTO Datos del reporte eliminado.
     */
    public function deleteReport(int $id): ReportDTO
    {
        $report = Report::findOrFail($id);
        $reportDTO = new ReportDTO($report->toArray());
        $report->delete();

        return $reportDTO;
    }
}
