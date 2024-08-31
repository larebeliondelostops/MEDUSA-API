<?php

namespace App\Services\Modules\Viper\Activity;

use App\Interfaces\Modules\Viper\ActivityInterface;
use App\Interfaces\Modules\Viper\FolderInterface;
use App\Interfaces\Modules\Viper\StatusInterface;
use App\Models\Modules\Viper\Activity;
use App\Models\Modules\Viper\Folder;
use App\Models\Modules\Viper\Deliverable;
use App\Models\Modules\Viper\StatusViper;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ActivityService implements ActivityInterface
{
    private FolderInterface $folderInterface;
    private StatusInterface $statusInterface;

    public function __construct(
        FolderInterface $folderInterface,
        StatusInterface $statusInterface
    )
    {
        $this->folderInterface = $folderInterface;
        $this->statusInterface = $statusInterface;
    }

    public function getAllActivities(int $deliverableId): Collection
    {
        // Obtener todas las actividades
        $activityGot = Activity::where('deliverable_id', $deliverableId)->with('higherPrecedences')->get();

        $activities = $activityGot->transform(function ($activity) {
            return collect($activity);
        });

        return $activities;
    }

    public function storeActivity(Collection $activity): Collection
    {
        $newActivity = new Activity();
        $newActivity->fill($activity->toArray());

        $deliverable = Deliverable::findOrFail($activity["deliverable_id"]);

        $activities = Activity::where('deliverable_id', $deliverable->id);

        $activity_number = $activities->max('number') + 1;

        // Verifica si el número ya existe en los productos asociados a los objetivos específicos
        if ($activity["number"]) {
            if ($activities->where('number', $activity["number"])->count() > 0) {
                // Si el número ya existe, puedes manejar aquí el error o la respuesta que desees
                throw new \Exception('Número ya existe en los productos asociados a los objetivos específicos', 422);
            }else{
                // Calcula el próximo número disponible para el nuevo producto
                $newActivity->number = $activity["number"];
            }
        }else{
            // Calcula el próximo número disponible para el nuevo producto
            $newActivity->number = $activity_number;
        }

        $folder = Folder::findOrFail($deliverable->folder_id);

        if ($folder->id) {
            $newFolder = new Folder();
            $newFolder->name =  $activity_number . '. ' . $activity["description"];
            $newFolder->higher_folder_id = $folder->id;
            // Crear la carpeta y establecer la relación higherFolders si se proporciona higher_folder_id
            $result = $this->folderInterface->createNewFolder(collect($newFolder));
            $newActivity->folder_id = $result["id"];

        } else {
            throw new \Exception('No se pudo asignar una carpeta a la actividad', 422);
        }

        $newActivity->save();

        return collect($newActivity);
    }

    public function updateActivity(int $activityId, Collection $activity): Collection
    {
        // Encontrar la actividad por su ID
        $activityUpdate = Activity::findOrFail($activityId);

        // Guardar la descripción actual de la actividad
        $oldDescription = $activityUpdate->description;
        $oldNumber = $activityUpdate->number;

        $deliverable = Deliverable::findOrFail($activity['deliverable_id']);

        // Obtener todas las actividades del mismo deliverable_id
        $activities = Activity::where('deliverable_id', $deliverable->id);

        if ($activities->where('number', $activity['number'])->count() > 0 && $activityUpdate->number !== $activity['number']) {
            // Si el número ya existe, puedes manejar aquí el error o la respuesta que desees
            throw new \Exception('Número ya existe en los productos asociados a los objetivos específicos', 422);
        }

        // Actualizar los datos de la actividad
        $activityUpdate->fill($activity->except([is_null($activity['number']) ? 'number' : '', 'folder_id'])->toArray());
        $activityUpdate->save();

        // Verificar si la descripción ha cambiado
        if ($oldDescription !== $activityUpdate->description || $oldNumber !== $activityUpdate->number) {
            // Obtener la carpeta asociada a la actividad
            $folder = Folder::find($activityUpdate->folder_id);

            if ($folder) {
                // Actualizar el nombre de la carpeta
                $folder->name = $activityUpdate->number . '. ' . $activityUpdate->description;
                $folder->save();
            } else {
                throw new \Exception('No se pudo encontrar la carpeta asociada a la actividad', 422);
            }
        }

        return collect($activityUpdate);
    }

    public function assignToReport(int $activityId, int $reportId)
    {
        $activity = Activity::findOrFail($activityId);
        $activity->report_id = $reportId;
        $activity->save();
    }

    public function deleteActivity(int $activityId)
    {
        // Encontrar la actividad por su ID
        $activity = Activity::findOrFail($activityId);

        Folder::findOrFail($activity->folder_id);

        $this->folderInterface->deleteFolder($activity->folder_id);

        // Eliminar la actividad
        $activity->delete();
    }

    public function getActivity(int $activityId): Collection
    {
        // Encontrar la actividad por su ID
        $activity = Activity::with('status')->findOrFail($activityId);
        return collect($activity);
    }

    public function getActivityByProductoWithReportNull(int $productId):Collection
    {
        $activityGod = Activity::whereHas('deliverable', function ($query) use ($productId) {
            $query->where('product_id', $productId);
        })
        ->whereNull('report_id')
        ->get();
    
        $activities = $activityGod->transform(
            function (Activity $activity)
            {
                return collect($activity);
            }
        );
        return $activities;
    }

    public function getActivityByProject(String $projectId): Collection
    {
        $activities = Activity::whereHas('deliverable.product.specificObjective.scope', function ($query) use ($projectId) {
                $query->where('project_id', $projectId);
            })
            ->with('progress') 
            ->get()
            ->transform(function (Activity $activity) {
                if ($activity->progress) {
                    $activity->progress->makeHidden(['id', 'week', 'observations', 'summary', 'conclusions', 'recommendations', 'activity_id', 'created_at']);
                }
                
                return $activity;
            });
    
        return collect($activities);
    }

    public function getAllActivityByProject(String $projectId):Collection
    {
        $activities = Activity::whereHas('deliverable.product.specificObjective.scope', function ($query) use ($projectId) {
            $query->where('project_id', $projectId);
        })
        ->with('measurementUnit') 
        ->get();

        return collect($activities);
    }

    public function updateStateActivityToInProgressByCurrentDate()
    {
        try
        {
            $currentDate = Carbon::now();
            $pendingStatusId = StatusViper::where('name', 'Pendiente')->first()->id;
            $activities = Activity::where('status_id', '=', $pendingStatusId)
                                ->where('start_date', '<=', $currentDate)
                                ->get();
            foreach ($activities as $activity) {
                $activity->status_id = $this->statusInterface->getStatusByName('En progreso')['id'];
                $activity->save();
            }
        }
        catch(Exception $exception)
        {
            Log::error($exception->getMessage() . ' - ' . $exception->getFile() . ' - ' . $exception->getLine());
        }
    }    
}
