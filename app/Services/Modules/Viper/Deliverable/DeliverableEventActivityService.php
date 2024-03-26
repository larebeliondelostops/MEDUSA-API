<?php 

namespace App\Services\Modules\Viper\Deliverable;
use App\Interfaces\Modules\Viper\Deliverable\DeliverableEventActivityInterface;

class DeliverableEventActivityService implements DeliverableEventActivityInterface
{   
    /**
     * Metodo diseñado para cuando se asigne una actividad a un entregable, se llame a este metodos y este actualice el incremento
     * al entregable al que se asigno la actividad y a la vez se actualice la data de sus entregables padres.
     */
    public function updateIncrementDataWithChildrenActivities(?int $deliverableId, array $activityData, array &$deliverablesData, array &$result)
    {
        $result[] = &$deliverablesData;
        if(!is_null($deliverableId))
        {
            $deliverable = &$deliverablesData; // deliverable actual # Comienza siendo el deliverable al que se le asigno la actividad y va escalando hasta el deliverable padre de todos

            if (is_null($deliverable['min_date'])) 
            {
                $deliverable['min_date'] = $activityData['start_date'];
            } 
            else  if ($deliverable['min_date'] > $activityData['start_date']) 
            {
                $deliverable['min_date'] = $activityData['start_date'];
            }
            
            if (is_null($deliverable['max_date'])) 
            {
                $deliverable['max_date'] = $activityData['end_date'];
            } 
            else if ($deliverable['max_date'] < $activityData['end_date']) 
            {
                $deliverable['max_date'] = $activityData['end_date'];
            }
                
            $deliverable['activity_quantity'] += 1;
            $deliverable['value'] += $activityData['total_value'];

            if (!is_null($deliverable['all_parents_of_deliverable_with_descendants']))
                $this->updateIncrementDataWithChildrenActivities($deliverable['deliverable_id'], $activityData, $deliverable['all_parents_of_deliverable_with_descendants'], $result);
            else
                return;
        }
        else
            return;
    }

      /**
     * Metodo diseñado para cuando se asigne una actividad a un entregable, se llame a este metodos y este actulice el decremento
     * al entregable al que se asigno la actividad y a la vez se actualice la data de sus entregables padres.
     */
    public function updateDecrementDataWithChildrenActivities(?array $previousDeliverable, array $activityData, array &$deliverablesData, array &$result)
    {
        $result[] = &$deliverablesData;
        $deliverable = &$deliverablesData; // deliverable actual # Comienza siendo el deliverable al que se le asigno la actividad y va escalando hasta el deliverable padre de todos
        $deliverable['activity_quantity'] -= 1;
        $deliverable['value'] -= $activityData['total_value'];

        if ($deliverable['min_date'] == $activityData['start_date']) 
        {
            $deliverable['min_date'] = null;
            if (count($deliverable['child_deliverables']) > 0)
            {
                if ($deliverable['activity_quantity'] == $previousDeliverable['activity_quantity'])
                {
                    $deliverable['min_date'] = $previousDeliverable['min_date'];
                }
                else
                {
                    foreach ($deliverable['child_deliverables'] as $deliverableChild)
                    {
                        if ($deliverableChild['id'] == $previousDeliverable['id']) continue;
                        else if ($deliverable['min_date'] == null) $deliverable['min_date'] = $deliverableChild['min_date'];
                        else if ($deliverable['min_date'] > $deliverableChild['min_date']) $deliverable['min_date'] = $deliverableChild['min_date'];
                    }
                }
            }
            else if (count($deliverable['activities']) > 1)
            {
                foreach ($deliverable['activities'] as $activity)
                {
                    if ($activity['id'] == $activityData['id']) continue;
                    else if ($deliverable['min_date'] == null) $deliverable['min_date'] = $activity['start_date'];
                    else if ($deliverable['min_date'] > $activity['start_date']) $deliverable['min_date'] = $activity['start_date'];
                }
            }
        }
        
        if ($deliverable['max_date'] == $activityData['end_date']) 
        {
            $deliverable['max_date'] = null;
            if (count($deliverable['child_deliverables']) > 0)
            {
                if ($deliverable['activity_quantity'] == $previousDeliverable['activity_quantity'])
                {
                    $deliverable['max_date'] = $previousDeliverable['max_date'];
                }
                else
                {
                    foreach ($deliverable['child_deliverables'] as $deliverableChild)
                    {
                        foreach ($deliverable['child_deliverables'] as $deliverableChild)
                        {
                            if ($deliverableChild['id'] == $previousDeliverable['id']) continue;
                            else if ($deliverable['max_date'] == null) $deliverable['max_date'] = $deliverableChild['max_date'];
                            else if ($deliverable['max_date'] < $deliverableChild['max_date']) $deliverable['max_date'] = $deliverableChild['max_date'];
                        }
                    }
                }
            }
            else if (count($deliverable['activities']) > 1)
            {
                $deliverable['max_date'] = null;
                foreach ($deliverable['activities'] as $activity)
                {
                    if ($activity['id'] == $deliverablesData['id']) continue;
                    else if ($deliverable['max_date'] == null) $deliverable['max_date'] = $activity['end_date'];
                    else if ($deliverable['max_date'] < $activity['end_date']) $deliverable['max_date'] = $activity['end_date'];
                }
            }
        }
        
        if (!is_null($deliverable['all_parents_of_deliverable_with_descendants']))
            $this->updateDecrementDataWithChildrenActivities($deliverable, $activityData, $deliverable['all_parents_of_deliverable_with_descendants'], $result);
        else  
            return;
    }
}