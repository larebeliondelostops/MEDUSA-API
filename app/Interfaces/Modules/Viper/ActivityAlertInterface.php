<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

interface ActivityAlertInterface
{
    /**
     * Obtiene una colección de actividades que están próximas a finalizar según el porcentaje de tiempo transcurrido especificado.
     *
     * Este método devuelve las actividades que ya debieron empezar y que han consumido un porcentaje especificado de su tiempo total asignado. 
     * El parámetro $timeElapsedPercentage puede tomar un valor entre 0 y 1, por defecto es 0.8 (80%), indica el umbral de tiempo transcurrido como un porcentaje.
     *
     * @param float $timeElapsedPercentage El porcentaje de tiempo transcurrido para determinar qué actividades están próximas a finalizar.
     *                                     Este valor debe estar entre 0 y 1, donde 0 significa recién iniciadas y 1 significa completadas.
     *                                     El valor por defecto es 0.8 (80%).
     * @return Collection Una colección de actividades que están cerca de finalizar basándose en el porcentaje de tiempo transcurrido dado.
     */
    public function getActivitiesComingSoonToFinish(float $timeElapsedPercentage = 0.8): Collection;
}