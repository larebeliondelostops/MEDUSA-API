<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\MilestoneSubclassInterface;
use App\Models\Modules\Viper\MilestoneSubclass;
use Exception;

/**
 * Servicio para la gestión de subclases de hitos en el sistema Viper.
 *
 * Este servicio implementa la interfaz MilestoneSubclassInterface y proporciona
 * métodos para la creación, actualización, obtención y eliminación de subclases de hitos.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0 */
class MilestoneSubclassService implements MilestoneSubclassInterface
{

    /**
     * Crea una nueva subclase de hitos.
     *
     * @param  Collection  $milestoneSubclass Datos de la subclase de hito a ser creado.
     * @return Collection Datos de la subclase de hito recién creado.
     */
    public function createNewMilestoneSubclass(Collection $milestoneSubclass): Collection
    {
        $newMilestoneSubclass = new MilestoneSubclass($milestoneSubclass->toArray());
        $newMilestoneSubclass->save();
        
        return collect($newMilestoneSubclass);
    }

    /**
     * Actualiza una subclase de hitos existente.
     *
     * @param  Collection  $milestoneSubclass Datos actualizados de la subclase de hito.
     * @param  int  $id Identificador único de la subclase de hito a ser acutalizado.
     * @return Collection Datos de la subclase de hito actualizado.
     */
    public function updateMilestoneSubclass(Collection $milestoneSubclass, int $id): Collection
    {
        $milestoneSubclassUpdate = MilestoneSubclass::findOrFail($id);
        $milestoneSubclassUpdate->fill($milestoneSubclass->toArray());
        $milestoneSubclassUpdate->save();
        
        return collect($milestoneSubclassUpdate);
    }

    /**
     * Obtiene todas las subclases de hitos asociadas a una clase de hitos específica.
     *
     * @param  int  $milestoneClassId Identificador únido de clase de hito.
     * @return Collection Collection de Collections de los subclase de hitos solicitados.
     */
    public function getAllMilestoneSubclassesByMilestoneClass(int $milestoneClassId): Collection
    {
        $milestoneSubclassGot = MilestoneSubclass::where('milestone_class_id', $milestoneClassId)->get();
        $milestoneSubclasses = $milestoneSubclassGot->transform(
            function (MilestoneSubclass $milestoneSubclass)
            {
                return collect($milestoneSubclass);
            }
        );
    
        return collect($milestoneSubclasses);
    }

    /**
     * Obtiene todas las subclases de hitos.
     *
     * @return Collection Collection de Collection con todos las subclases de hitos.
     */
    public function getAllMilestoneSubclasses(): Collection
    {
        $milestoneSubclassGot = MilestoneSubclass::all();
        $milestoneSubclases = $milestoneSubclassGot->transform(
            function (MilestoneSubclass $milestoneSubclass)
            {
                return collect($milestoneSubclass);
            }
        );


        return $milestoneSubclases;
    }

    /**
     * Obtiene una subclase de hitos por su ID.
     *
     * @param  int  $id Identificador único de la subclase de hito
     * @return Collection Daots de la subclase de hito
     */
    public function getMilestoneSubclass(int $id): Collection
    {
        $milestoneSubclass = MilestoneSubclass::findOrFail($id);
        
        return collect($milestoneSubclass);
    }

    /**
     * Elimina una subclase de hitos por su ID.
     *
     * @param  int  $id Identificador único de la subclase de hito a ser eliminado
     * @return Collection Datos de la subclase de hito eliminada.
     */
    public function deleteMilestoneSubclass(int $id): Collection
    {
        $milestoneSubclass = MilestoneSubclass::findOrFail($id);
        $milestoneSubclass->delete();

        return collect($milestoneSubclass);
    }
}
