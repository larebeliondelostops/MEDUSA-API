<?php

namespace App\Services\Modules\Viper\Activity;

use App\Interfaces\Modules\Viper\ActivityAlertInterface;
use App\Models\Modules\Viper\Activity;
use App\Models\Modules\Viper\StatusViper;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ActivityAlertService implements ActivityAlertInterface
{
    /**
     * Obtiene una colección de actividades que están próximas a finalizar según el porcentaje de tiempo transcurrido especificado.
     *
     * Este método devuelve las actividades que ya debieron empezar y que han consumido un porcentaje especificado de su tiempo total asignado. 
     * El parámetro $timeElapsedPercentage puede tomar un valor entre 0 y 1, por defecto es 0.8 (80%), indica el umbral de tiempo transcurrido como un porcentaje.
     *
     * @param float $timeElapsedPercentage El porcentaje de tiempo transcurrido para determinar qué actividades están próximas a finalizar.
     *                                     Este valor debe estar entre 0 y 1, donde 0 significa recién iniciadas y 1 significa completadas.
     *                                     El valor por defecto es 80.
     * @return Collection Una colección de actividades que están cerca de finalizar basándose en el porcentaje de tiempo transcurrido dado.
     */
    public function getActivitiesComingSoonToFinish(float $timeElapsedPercentage = 0.8): Collection
    {
        // Obtener las actividades que ya iniciaron y que han consumido un porcentaje específico de su tiempo total asignado
        $currentDate = Carbon::now();

        $InProgressStatusId = StatusViper::where('name', 'En progreso')->first()->id;
        $activities = Activity::where('start_date', '<=', $currentDate)
            ->where('status_id', $InProgressStatusId) // Asegúrate de cambiar esto según sea necesario para filtrar por estado
            ->get();

        $filteredActivities = $activities->filter(function ($activity) use ($currentDate, $timeElapsedPercentage) {
            $startDate = Carbon::parse($activity->start_date);
            $endDate = Carbon::parse($activity->end_date);
            $totalDuration = $endDate->diffInSeconds($startDate);
            $elapsedDuration = $currentDate->diffInSeconds($startDate);

            return ($elapsedDuration / $totalDuration) >= $timeElapsedPercentage;
        });

        return $filteredActivities;
    }
}