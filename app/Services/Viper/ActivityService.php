<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Activity\ActivityDTO;
use App\DTOs\Viper\Folder\FolderDTO;
use App\Interfaces\Viper\ActivityInterface;
use App\Interfaces\Viper\FolderInterface;
use App\Models\Viper\Activity;
use App\Models\Viper\Deliverable;
use App\Models\Viper\Folder;
use Illuminate\Support\Collection;

class ActivityService implements ActivityInterface
{
    private FolderInterface $folderInterface;

    public function __construct(FolderInterface $folderInterface)
    {
        $this->folderInterface = $folderInterface;
    }

    public function getAllActivities(int $deliverableId)
    {
        // Obtener todas las actividades
        $activities = Activity::where('deliverable_id', $deliverableId)->with('higherPrecedences')->get();
        
        $activityDTOs = $activities->map(function ($activity) {
            return new ActivityDTO($activity->toArray());
        });

        return $activityDTOs;
    }

    public function storeActivity(ActivityDTO $activityDTO)
    {
        // Crear una nueva instancia del modelo Activity y guardar los datos
        $activity = new Activity();
        $activity->fill($activityDTO->toArray());

        $deliverable = Deliverable::findOrFail($activityDTO->deliverable_id);
        
        $activities = Activity::where('deliverable_id', $deliverable->id);

        $activity_number = $activities->max('number') + 1;

        // Verifica si el número ya existe en los productos asociados a los objetivos específicos
        if ($activityDTO->number) {
            if ($activities->where('number', $activityDTO->number)->count() > 0) {
                // Si el número ya existe, puedes manejar aquí el error o la respuesta que desees
                throw new \Exception('Número ya existe en los productos asociados a los objetivos específicos', 422);
            }else{
                // Calcula el próximo número disponible para el nuevo producto
                $activity->number = $activityDTO->number;
            }
        }else{
            // Calcula el próximo número disponible para el nuevo producto
            $activity->number = $activity_number;
        }

        $folder = Folder::findOrFail($deliverable->folder_id);
        
        if ($folder->id) {
            $folderDTO = new FolderDTO([
                "name" =>  $activity_number . '. ' . $activityDTO->description,
                "higher_folder_id" => $folder->id
            ]);                
            // Crear la carpeta y establecer la relación higherFolders si se proporciona higher_folder_id
            $result = $this->folderInterface->createNewFolder($folderDTO);
            $activity->folder_id = $result->id;

        } else {
            throw new \Exception('No se pudo asignar una carpeta a la actividad', 422);
        }

        $activity->save();

        return new ActivityDTO($activity->toArray());
    }

    public function updateActivity($activityId, ActivityDTO $activityDTO)
    {
        // Encontrar la actividad por su ID
        $activity = Activity::findOrFail($activityId);
    
        // Guardar la descripción actual de la actividad
        $oldDescription = $activity->description;
        $oldNumber = $activity->number;
    
        $deliverable = Deliverable::findOrFail($activityDTO->deliverable_id);
    
        // Obtener todas las actividades del mismo deliverable_id
        $activities = Activity::where('deliverable_id', $deliverable->id);
    
        if ($activities->where('number', $activityDTO->number)->count() > 0 && $activity->number !== $activityDTO->number) {
            // Si el número ya existe, puedes manejar aquí el error o la respuesta que desees
            throw new \Exception('Número ya existe en los productos asociados a los objetivos específicos', 422);
        }
    
        // Actualizar los datos de la actividad
        $activity->fill($activityDTO->toArray([is_null($activityDTO->number) ? 'number' : '', 'folder_id']));
        $activity->save();
    
        // Verificar si la descripción ha cambiado
        if ($oldDescription !== $activity->description || $oldNumber !== $activity->number) {
            // Obtener la carpeta asociada a la actividad
            $folder = Folder::find($activity->folder_id);
    
            if ($folder) {
                // Actualizar el nombre de la carpeta
                $folder->name = $activity->number . '. ' . $activity->description;
                $folder->save();
            } else {
                throw new \Exception('No se pudo encontrar la carpeta asociada a la actividad', 422);
            }
        }
    
        return new ActivityDTO($activity->toArray());
    }
    

    public function deleteActivity($activityId)
    {
        // Encontrar la actividad por su ID
        $activity = Activity::findOrFail($activityId);

        Folder::findOrFail($activity->folder_id);

        $this->folderInterface->deleteFolder($activity->folder_id);

        // Eliminar la actividad
        $activity->delete();

    }

    public function getActivity($activityId)
    {
        // Encontrar la actividad por su ID
        $activity = Activity::findOrFail($activityId);

        return new ActivityDTO($activity->toArray());
    }

}
