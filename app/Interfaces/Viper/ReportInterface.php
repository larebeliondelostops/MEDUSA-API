<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Report\ReportDTO;

/**
 * Interfaz para la gestión de operaciones relacionadas con los reportes (Reports) en el sistema Viper.
 *
 * Esta interfaz define los métodos que deben ser implementados por las clases que gestionan la lógica
 * de negocio de los reportes en la aplicación Viper.
 *
 * @package App\Interfaces\Viper
 * @author Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright 2024 Ignicion S.A.S.
 * @version v1.0.0
 */
interface ReportInterface
{
    /**
     * Crea un nuevo reporte.
     *
     * @param ReportDTO $reportDTO Datos del reporte a crear.
     * @return ReportDTO Datos del reporte creado.
     */
    public function createNewReport(ReportDTO $reportDTO): ReportDTO;

    /**
     * Actualiza un reporte existente.
     *
     * @param ReportDTO $reportDTO Datos del reporte actualizado.
     * @param int $id Identificador único del reporte a actualizar.
     * @return ReportDTO Datos del reporte actualizado.
     */
    public function updateReport(ReportDTO $reportDTO, int $id): ReportDTO;

    /**
     * Obtiene todos los reportes asociados a un proyecto.
     *
     * @param string $projectBpin BPIN del proyecto.
     * @return array Array de objetos ReportDTO que representan los reportes asociados al proyecto.
     */
    public function getAllReportByProject(string $projectBpin): array;

    /**
     * Obtiene un reporte específico por su identificador único.
     *
     * @param string $id Identificador único del reporte.
     * @return ReportDTO Datos del reporte encontrado.
     */
    public function getReport(string $id): ReportDTO;

    /**
     * Elimina un reporte existente por su identificador único.
     *
     * @param int $id Identificador único del reporte a eliminar.
     * @return ReportDTO Datos del reporte eliminado.
     */
    public function deleteReport(int $id): ReportDTO;
}
