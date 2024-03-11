<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\MilestoneClassInterface;
use App\Models\Modules\Viper\MilestoneClass;
use Exception;

/**
 * Servicio para la gestión de clases de hitos en el sistema Viper.
 *
 * Este servicio implementa la interfaz MilestoneClassInterface y proporciona lógica de negocio
 * para la creación, actualización, obtención y eliminación de clases de hitos.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class MilestoneClassService implements MilestoneClassInterface
{
    /**
     * Crea una nueva clase de hito.
     *
     * @param  Collection  $milestoneClass Datos de la clase de hito a se creada.
     * @return Collection Datos de la clase de hito recién creada.
     */
    public function createNewMilestoneClass(Collection $milestoneClass): Collection
    {
        $newMilestoneClass = new MilestoneClass($milestoneClass->toArray());
        $newMilestoneClass->save();

        return collect($newMilestoneClass);
    }

    /**
     * Actualiza una clase de hito existente.
     *
     * @param  Collection  $milestoneClass Datos actualizados de la clase de hito.
     * @param  int  $id Identificador único de la clase de hito a ser actualizado.
     * @return Collection Daots de la clase de hito actualizado.
     */
    public function updateMilestoneClass(Collection $milestoneClass, int $id): Collection
    {
        
        $milestoneClassUpdate = MilestoneClass::findOrFail($id);
        $milestoneClassUpdate->fill($milestoneClass->toArray());
        $milestoneClassUpdate->save();

        return collect($milestoneClassUpdate);
    }

    /**
     * Obtiene todas las clases de hitos.
     *
     * @return Collection Collection de Collections con todas las clases de hitos.
     */
    public function getAllMilestoneClasses(): Collection
    {
        $milestoneClassGot = MilestoneClass::all();
        $milestoneClasses = $milestoneClassGot->transform(
            function (MilestoneClass $milestoneClass)
            {
                return collect($milestoneClass);
            }
        );
        return $milestoneClasses;
    }

    /**
     * Obtiene una clase de hito específica por su ID.
     *
     * @param  int  $id Identificador único de la clase de hito.
     * @return Collection Daots de la clase de hito.
     */
    public function getMilestoneClass(int $id): Collection
    {

        $milestoneClass = MilestoneClass::findOrFail($id);

        return collect($milestoneClass);
    }

    /**
     * Elimina una clase de hito por su ID.
     *
     * @param  int  $id Identificador único de la clase de hito a ser eliminado.
     * @return Collection
     */
    public function deleteMilestoneClass(int $id): Collection
    {
        $milestoneClass = MilestoneClass::findOrFail($id);
        $milestoneClass->delete();

        return collect($milestoneClass);
    }
}
