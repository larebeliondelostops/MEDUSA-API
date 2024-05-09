<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ReportInterface;
use App\Interfaces\Modules\Viper\ActivityInterface;
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
    private ActivityInterface $activityInterface;

    public function __construct(ActivityInterface $activityInterface)
    {
        $this->activityInterface = $activityInterface;
    }

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

        if ($report['activities']!= null){
            $this->assignToActivity($newReport->id,$report['activities']);
        }
        
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

        if ($report['activities'] != null){
            $this->assignToActivity($reportUpdate->id,$report['activities']);
        }

        return collect($reportUpdate);
    }
    
    /**
     * Obtiene el informe asociado a un actividad.
     *
     * @param  int  $activityId El ID de la actividad.
     * @return Collection Datos que representan el informe asociado al actividad.
     */
    public function getReportByActivity(int $activityId): Collection
    {
        $report = Report::whereHas('activities', function ($query) use ($activityId) {
            $query->where('id', $activityId);
        })->get();
    
        return collect($report);
    }

    /**
     * Obtiene el informe asociado a una actividad con sus pruebas.
     *
     * @param  int  $activityId El ID de la actividad.
     * @return  Collection Daots que representan el informe asociado a la actividad, incluyendo pruebas.
     */
    public function getReportByActivityWithProof(int $activityId): Collection
    {
        $report = Report::with('proofs')->whereHas('activities', function ($query) use ($activityId) {
            $query->where('id', $activityId);
        })->get();

        return $report;
    }

    public function getReportByProject(int $projectId): Collection
    {
        $report = Report::with('proofs')->whereHas('activities.deliverable.product.specificObjective.scope', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })->get();

        return $report;
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

    public function assignToActivity(int $reportId,array $activities)
    {
        foreach ($activities as $activity) 
        {
            $this->activityInterface->assignToReport($activity,$reportId);
        }
    }
}
