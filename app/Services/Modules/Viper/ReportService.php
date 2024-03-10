<?php

namespace App\Services\Modules\Viper;

use App\DTOs\Viper\Report\ReportDTO;
use App\DTOs\Viper\Report\ReportWithProofDTO;
use App\Interfaces\Modules\Viper\ReportInterface;
use App\Models\Modules\Viper\Report;
use Exception;

/**
 * Clase que proporciona servicios para la gestión de informes en el sistema Viper.
 *
 * Esta clase implementa la interfaz ReportInterface y ofrece métodos para crear, actualizar, recuperar y eliminar informes.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0  
 */
class ReportService implements ReportInterface
{
    /**
     * Crea un nuevo informe.
     *
     * @param  ReportDTO  $reportDTO Los datos del informe a crear.
     * @return ReportDTO El DTO que representa el informe creado.
     * @throws Exception Si ocurre un error durante el proceso.
     */
    public function createNewReport(ReportDTO $reportDTO): ReportDTO
    {
        $report = new Report();
        $report->fill($reportDTO->toArray());
        $report->save();
        
        return new ReportDTO($report->toArray());
    }

    /**
     * Actualiza un informe existente.
     *
     * @param  ReportDTO  $reportDTO Los nuevos datos del informe.
     * @param  int  $id El ID del informe a actualizar.
     * @return ReportDTO El DTO que representa el informe actualizado.
     * @throws Exception Si el informe no se encuentra o hay un error durante el proceso.
     */
    public function updateReport(ReportDTO $reportDTO, int $id): ReportDTO
    {
        $report = Report::findOrFail($id);
        $report->fill($reportDTO->toArray());
        $report->save();

        return new ReportDTO($report->toArray());
    }
    
    /**
     * Obtiene todos los informes asociados a un producto.
     *
     * @param  int  $productId El ID del producto.
     * @return array Un arreglo de objetos ReportDTO representando los informes asociados al producto.
     */
    public function getAllReportsByProduct(int $productId): array
    {
        $reports = Report::where('product_id', $productId)->get();
        $reportDTOs = $reports->map(function ($report) {
            return new ReportDTO($report->toArray());
        })->all();
    
        return $reportDTOs;
    }

    /**
     * Obtiene todos los informes asociados a un producto con sus pruebas.
     *
     * @param  int  $productId El ID del producto.
     * @return array Un arreglo de objetos ReportWithProofDTO representando los informes asociados al producto, incluyendo pruebas.
     */
    public function getAllReportsByProductWithProof(int $productId): array
    {
        $reports = Report::with('proofs')->where('product_id', $productId)->get();
        $reportDTOs = $reports->map(function ($report) {
            return new ReportWithProofDTO($report->toArray());
        })->all();

        return $reportDTOs;
    }

    /**
     * Obtiene un informe por su ID.
     *
     * @param  int  $id El ID del informe.
     * @return ReportDTO El DTO que representa el informe encontrado.
     * @throws Exception Si el informe no se encuentra.
     */
    public function getReport(int $id): ReportDTO
    {
        $report = Report::findOrFail($id);
        
        return new ReportDTO($report->toArray());
    }

    /**
     * Elimina un informe por su ID.
     *
     * @param  int  $id El ID del informe a eliminar.
     * @return ReportDTO El DTO que representa el informe eliminado.
     * @throws Exception Si el informe no se encuentra o hay un error durante el proceso.
     */
    public function deleteReport(int $id): ReportDTO
    {
        $report = Report::findOrFail($id);
        $reportDTO = new ReportDTO($report->toArray());
        $report->delete();

        return $reportDTO;
    }
}
