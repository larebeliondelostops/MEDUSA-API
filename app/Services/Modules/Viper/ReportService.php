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
        $newReport->responsible = auth()->user()->id;
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
     * Obtiene el informe asociado a un entregable.
     *
     * @param  int  $deliverableId El ID del entregable.
     * @return Collection Datos que representan el informe asociado al entregable.
     */
    public function getReportByDeliverable(int $deliverableId): Collection
    {
        $report = Report::whereHas('deliverables', function ($query) use ($deliverableId) {
            $query->where('deliverable_id', $deliverableId);
        })->get();
    
        return collect($report);
    }

    /**
     * Obtiene el informe asociado a un entregable con sus pruebas.
     *
     * @param  int  $deliverableId El ID del producto.
     * @return  Collection Daots que representan el informe asociado al entregable, incluyendo pruebas.
     */
    public function getReportByDeliverableWithProof(int $deliverableId): Collection
    {
        $report = Report::with('proofs')->whereHas('deliverables', function ($query) use ($deliverableId) {
            $query->where('deliverable_id', $deliverableId);
        })->get();

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
