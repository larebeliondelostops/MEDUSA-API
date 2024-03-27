<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\ImprovementPlanInterface;
use App\Models\Modules\Viper\ImprovementPlan;
use Exception;

/**
 * Servicio de manejo de plan de mejor en el sistema Viper.
 *
 * Implementa la interfaz ImprovementPlan para definir las operaciones necesarias para la gestión de plan de mejoras.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ImprovementPlanService implements ImprovementPlanInterface
{
    
    /**
     * Crea un nuevo plan de mejora en el sistema.
     *
     * @param Collection $improvementPlan Datos del plan de mejora a crear.
     * @return Collection Datos del nuevo plan de mejora creado.
     */
    public function createNewImprovementPlan(Collection $improvementPlan): Collection
    {
        $newImprovementPlan = new ImprovementPlan($improvementPlan->toArray());
        $newImprovementPlan->save();
        
        return collect($newImprovementPlan);
    }

    /**
     * Actualiza una alerta existente en el sistema.
     *
     * @param Collection $improvementPlan Datos actualizados del plan de mejora.
     * @param int $id Identificador único del plan de mejora a actualizar.
     * @return Collection Datos del plan de mejora  actualizado.
     */
    public function updateImprovementPlan(Collection $improvementPlan, int $id): Collection
    {
        $improvementPlanUpdate = ImprovementPlan::findOrFail($id);
        $improvementPlanUpdate->fill($improvementPlan->toArray());
        $improvementPlanUpdate->save();
        
        return collect($improvementPlanUpdate);
    }

    /**
     * Obtiene el plan de mejora asociado a una alerta específica.
     *
     * @param int $alertId Identificador del indicador.
     * @return Collection Collection que representando el plan de mejora asociado a una alerta.
     */
    public function getImprovementPlanByAlert(int $alertId): Collection
    {
        $improvementPlan = ImprovementPlan::where('alert_id', $alertId)->firstOrFail();

        return collect($improvementPlan);
    }

    /**
     * Obtiene los datos de un plan de mejora específico por su identificador.
     *
     * @param int $id Identificador único del plan de mejora.
     * @return Collection Datos del plan de mejora solicitado.
     */
    public function getImprovementPlan(int $id): Collection
    {
        $improvementPlan = ImprovementPlan::findOrFail($id);
        
        return collect($improvementPlan);
    }

    /**
     * Elimina un plan de mejora específico por su identificador.
     *
     * @param int $id Identificador único del plan de mejora a eliminar.
     * @return Collection Datos del plan de mejora eliminado.
     */
    public function deleteImprovementPlan(int $id): Collection
    {
        $improvementPlan = ImprovementPlan::findOrFail($id);
        $improvementPlan->delete();

        return collect($improvementPlan);
    }
}
