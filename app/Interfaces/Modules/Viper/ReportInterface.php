<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Report\ReportDTO;

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
     * @param \App\DTOs\Viper\Report\ReportDTO $reportDTO DTO del reporte a crear.
     * @return \App\DTOs\Viper\Report\ReportDTO
     */
    public function createNewReport(ReportDTO $reportDTO): ReportDTO;

    /**
     * Actualiza un reporte existente en el sistema.
     *
     * @param \App\DTOs\Viper\Report\ReportDTO $reportDTO DTO del reporte actualizado.
     * @param int $id ID del reporte a actualizar.
     * @return \App\DTOs\Viper\Report\ReportDTO
     */
    public function updateReport(ReportDTO $reportDTO, int $id): ReportDTO;
    
    /**
     * Obtiene todos los reportes asociados a un producto en el sistema.
     *
     * @param int $productId ID del producto.
     * @return array Array de objetos ReportDTO.
     */
    public function getAllReportsByProduct(int $productId): array;

    /**
     * Obtiene todos los reportes asociados a un producto con su reportes incluidos en el sistema.
     *
     * @param int $productId ID del producto.
     * @return array Array de objetos ReportDTO.
     */
    public function getAllReportsByProductWithProof(int $productId): array;

    /**
     * Obtiene un reporte específico del sistema por su ID.
     *
     * @param int $id ID del reporte.
     * @return \App\DTOs\Viper\Report\ReportDTO
     */
    public function getReport(int $id): ReportDTO;

    /**
     * Elimina un reporte del sistema por su ID.
     *
     * @param int $id ID del reporte a eliminar.
     * @return \App\DTOs\Viper\Report\ReportDTO
     */
    public function deleteReport(int $id): ReportDTO;
}
