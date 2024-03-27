<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interfaz para gestionar operaciones relacionadas con los planes de mejoras en el sistema Viper.
 *
 * @package App\Interfaces\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface ImprovementPlanInterface {

    /**
     * Crea un nuevo plan de mejora.
     *
     * @param Collection $improvementPlan La información del plan de mejora a ser creada.
     * @return Collection El plan de mejora creada.
     */
    public function createNewImprovementPlan(Collection $improvementPlan): Collection;

    /**
     * Actualiza un plan de mejora existente.
     *
     * @param Collection $improvementPlan La información del plan de mejora a ser actualizada.
     * @param int $id El identificador único del plan de mejora a ser actualizada.
     * @return Collection El plan de mejora actualizada.
     */
    public function updateImprovementPlan(Collection $improvementPlan, int $id): Collection;

    /**
     * Obtiene el plan de mejora asociado a una alerta específico.
     *
     * @param int $alertId El identificador único de la alerta.
     * @return Collection Collection que contiene la información de un plan de mejora de una alert.
     */
    public function getImprovementPlanByAlert(int $alertId): Collection;

    /**
     * Obtiene los detalles de un plan de mejora específica.
     *
     * @param int $id El identificador único del plan de mejora.
     * @return Collection La información del plan de mejora.
     */
    public function getImprovementPlan(int $id): Collection;

    /**
     * Elimina un plan de mejora específica.
     *
     * @param int $id El identificador único del plan de mejora a ser eliminada.
     * @return Collection El plan de mejora eliminada.
     */
    public function deleteImprovementPlan(int $id): Collection;
}
