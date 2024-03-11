<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
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
     * @param  Collection  $report Los datos del informe a crear.
     * @return Collection Datos que representa el informe creado.
     */
    public function createNewReport(Collection $report): Collection
    {
        $newReport = new Report($report->toArray());
        $newReport->save();
        
        return collect($newReport);
    }

    /**
     * Actualiza un informe existente.
     *
     * @param  Collection  $report Los nuevos datos del informe.
     * @param  int  $id El ID del informe a actualizar.
     * @return Collection  Datos que representa el informe actualizado.
     */
    public function updateReport(Collection $report, int $id): Collection
    {
        $reportUpdate = Report::findOrFail($id);
        $reportUpdate->fill($report->toArray());
        $reportUpdate->save();

        return collect($reportUpdate);
    }
    
    /**
     * Obtiene todos los informes asociados a un producto.
     *
     * @param  int  $productId El ID del producto.
     * @return Collection Datos que representando los informes asociados al producto.
     */
    public function getAllReportsByProduct(int $productId): Collection
    {
        $reportGot = Report::where('product_id', $productId)->get();
        $reports = $reportGot->transform(
            function (Report $report)
            {
                return collect($report);
            }
        );
    
        return $reports;
    }

    /**
     * Obtiene todos los informes asociados a un producto con sus pruebas.
     *
     * @param  int  $productId El ID del producto.
     * @return  Collection Daots que representando los informes asociados al producto, incluyendo pruebas.
     */
    public function getAllReportsByProductWithProof(int $productId): Collection
    {
        $reportGot = Report::with('proofs')->where('product_id', $productId)->get();
        $reports = $reportGot->transform(
            function (Report $report)
            {
                return collect($report);
            }
        );

        return $reports;
    }

    /**
     * Obtiene un informe por su ID.
     *
     * @param  int  $id El ID del informe.
     * @return Collection Datos que representa el informe encontrado.
     */
    public function getReport(int $id): Collection
    {
        $report = Report::findOrFail($id);
        
        return collect($report);
    }

    /**
     * Elimina un informe por su ID.
     *
     * @param  int  $id El ID del informe a eliminar.
     * @return Collection Datos que representa el informe eliminado.
     */
    public function deleteReport(int $id): Collection
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return collect($report);
    }
}
