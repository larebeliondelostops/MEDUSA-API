<?php 

namespace App\Services\Modules\Viper\Activity;
use App\Interfaces\Modules\Viper\Deliverable\DeliverableEventActivityInterface;
use App\Interfaces\Modules\Viper\Deliverable\DeliverableInterface;
use App\Models\Modules\Viper\Activity;
use App\Models\Modules\Viper\Deliverable;
use Illuminate\Support\Facades\DB;

class ActivityObserver
{
    private DeliverableEventActivityInterface $deliverableEventActivityInterface;
    private DeliverableInterface $deliverableInterface;
    private array $dataDeliverablesForActivity = []; // contiene la data de los deliverables requeridos en un formato recursivo.
    private array $dataDeliverablesForUpdate = [];  // contiene referencias a datos de los deliverables en el formato recursivo pero organizado para actualizar la data.

    public function __construct(
        DeliverableEventActivityInterface $deliverableEventActivityInterface,
        DeliverableInterface $deliverableInterface
    )
    {
        $this->deliverableEventActivityInterface = $deliverableEventActivityInterface;  
        $this->deliverableInterface = $deliverableInterface;
    }

    private function refreshDataDeliverablesForActivity(int $activityId)
    {
        $this->dataDeliverablesForActivity = $this->deliverableInterface->getDeliverableWithAllParentsByDeliverableFatherActivityId($activityId);
    }

    private function saveDataDeliverablesForActivity()
    {
        DB::transaction(function () {
            foreach ($this->dataDeliverablesForUpdate as $deliverableData) {
                $deliverableId = $deliverableData['id'];
                unset($deliverableData['id']); // No queremos actualizar el ID
        
                // Filtrar solo las claves que están presentes en el modelo
                $filteredData = array_intersect_key($deliverableData, array_flip((new Deliverable())->getFillable()));
        
                // Actualizar el registro usando solo los datos filtrados
                Deliverable::where('id', $deliverableId)->update($filteredData);
            }
        });
    }

    /**
     * Handle the activity "created" event.
     *
     * @param  \App\Models\Modules\Viper\Activity  $activity
     * @return void
     */
    public function created(Activity $activity)
    {
        $this->refreshDataDeliverablesForActivity($activity->deliverable_id);
        $this->deliverableEventActivityInterface->updateIncrementDataWithChildrenActivities($activity->deliverable_id, $activity->toArray(), $this->dataDeliverablesForActivity[0], $this->dataDeliverablesForUpdate);
        $this->saveDataDeliverablesForActivity();
    }

    public function updating(Activity $activity)
    {   
        $activity = Activity::find($activity->id);
        $this->refreshDataDeliverablesForActivity($activity->deliverable_id);
        $this->deliverableEventActivityInterface->updateDecrementDataWithChildrenActivities(null, $activity->toArray(), $this->dataDeliverablesForActivity[0], $this->dataDeliverablesForUpdate);
        $this->deliverableInterface->updateDeliverableActivityQuantity($activity->deliverable_id);
        $this->saveDataDeliverablesForActivity();
    }

    public function updated(Activity $activity)
    {
        $this->refreshDataDeliverablesForActivity($activity->deliverable_id);
        $this->deliverableEventActivityInterface->updateIncrementDataWithChildrenActivities($activity->deliverable_id, $activity->toArray(), $this->dataDeliverablesForActivity[0], $this->dataDeliverablesForUpdate);
        $this->saveDataDeliverablesForActivity();
    }

    public function deleting(Activity $activity)
    {
        $this->refreshDataDeliverablesForActivity($activity->deliverable_id);
        $this->deliverableEventActivityInterface->updateDecrementDataWithChildrenActivities(null, $activity->toArray(), $this->dataDeliverablesForActivity[0], $this->dataDeliverablesForUpdate);
        $this->saveDataDeliverablesForActivity();
    }
}