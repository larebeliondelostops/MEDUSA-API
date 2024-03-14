<?php

namespace App\Services\Modules\Viper;
use App\Interfaces\Modules\Viper\DeliverableInterface;
use App\Interfaces\Modules\Viper\FolderInterface;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Models\Modules\Viper\Deliverable;
use Illuminate\Support\Collection;

class DeliverableService implements DeliverableInterface
{
    private FolderInterface $folderInterface;
    private ProductInterface $productInterface;

    public function __construct(
        FolderInterface $folderInterface,
        ProductInterface $productInterface,
        )
    {
        $this->folderInterface = $folderInterface;
        $this->productInterface = $productInterface;
    }

    public function createNewDeliverable(Collection $deliverableData) : Collection
    {
        if (!isset($deliverableData['folder_id'])) $deliverableData['folder_id'] = null;

        $folderData = $this->folderInterface->createNewFolder(
            collect(
                [
                    'name' => $deliverableData['number'] .'. '.$deliverableData['name'],
                    'higher_folder_id' => (
                        is_null($deliverableData['folder_id']) ?
                        ($this->productInterface->getProduct($deliverableData['product_id']))['folder']['id'] :
                        $deliverableData->folder_id
                    ),
                ]
            )
        );
        $deliverableData['folder_id'] = $folderData['id'];
        $deliverable = collect($deliverableData->toArray());
        $deliverable->save();
        return $deliverable;
    }

    /**
     * Metodo diseñado para cuando se asigne una actividad a un entregable, se llame a este metodos y este actulice el incremento
     * al entregable al que se asigno la actividad y a la vez se actualice la data de sus entregables padres.
     */
    public function updateIncrementDataWithChildrenActivities(?int $deliverableId, Collection $activityData)
    {
        if(!is_null($deliverableId))
        {
            $deliverable = Deliverable::findOrFail($deliverableId);
            $deliverable->activity_quantity += 1;
            $deliverable->value += $activityData['total_value'];
            $deliverable->save();
            $this->updateIncrementDataWithChildrenActivities($deliverable->deliverable_id, $activityData);
        }
        else
            return;
    }

      /**
     * Metodo diseñado para cuando se asigne una actividad a un entregable, se llame a este metodos y este actulice el decremento
     * al entregable al que se asigno la actividad y a la vez se actualice la data de sus entregables padres.
     */
    public function updateDecrementDataWithChildrenActivities(?int $deliverableId, Collection $activityData)
    {
        if(!is_null($deliverableId))
        {
            $deliverable = Deliverable::findOrFail($deliverableId);
            $deliverable->activity_quantity -= 1;
            $deliverable->value -= $activityData['total_value'];
            $deliverable->save();
            $this->updateDecrementDataWithChildrenActivities($deliverable->deliverable_id, $activityData);
        }
        else
            return;
    }

    private function adjustDataAndSave(array &$deliverables, array &$result, ?int $fatherDeliverableId = null ) : void
    {
        foreach($deliverables as $deliverable)
        {
            $deliverableData = collect($deliverable);
            $deliverableData->deliverable_id = $fatherDeliverableId;
            $deliverableData = $this->createNewDeliverable($deliverableData);
            if (count($deliverable['deliverables']) > 0)
                $this->adjustDataAndSave($deliverable['deliverables'], $result, $deliverableData->id);

            array_push($result, $deliverableData); // se agrega el dato almacenado al array de resultado
        }
    }

    public function createMultipleDeliverables(array $deliverablesData) : Collection
    {
        $result = [];
        $this->adjustDataAndSave($deliverablesData, $result);
        return  collect($result);
    }

    public function getAllDeliverables() : Collection
    {
        $deliverables = Deliverable::all();
        return collect($deliverables);
    }

    private function getAndAjustData(array &$result, int &$productId, ?int $fatherDeliverableId = null) : void
    {
        $deliverables = Deliverable::with('activities')->where('product_id', $productId) // busca los entregables con productId $number
                        ->Where('deliverable_id', $fatherDeliverableId) // y que tenga de padre a $father
                        ->get() // realiza la consulta
                        ->toArray(); // la convierte a un array

        foreach($deliverables as $deliverable)
        {
            array_push(
                $result,
                $deliverable
            );
            $this->getAndAjustData($deliverable->deliverables, $productId, $deliverable->id);
        }
    }

    public function getDeliverablesByProductId(int $productId) : Collection
    {
        $result = []; // array para guardar los deliverables
        $this->getAndAjustData($result, $productId);
        return collect($result);
    }

    public function updateDeliverable(Collection $deliverableUpdateData, int $deliverableId) : Collection
    {
        $delivarableForUpdate = Deliverable::findOrFail($deliverableId);
        $delivarableForUpdate->fill([
            'number' => $deliverableUpdateData['number'],
            'name' => $deliverableUpdateData['name']
        ]);
        $delivarableForUpdate->save(); // Se actualiza la data del entregable

        $deliverableUpdateData->fill($delivarableForUpdate->toArray()); // se llena el objeto con los datos actualizados

        $deliverableUpdateData->folder = $this->folderInterface->updateFolderName(
            $delivarableForUpdate->folder_id,
            $delivarableForUpdate->number.'. '.$delivarableForUpdate->name);

        return $deliverableUpdateData;
    }

    public function getDeliverablesChildren(array &$result, int $fatherDeliverableId)
    {
        $deliverables = Deliverable::with('folder')->where('deliverable_id', $fatherDeliverableId)->get();
        foreach($deliverables as $deliverable)
        {
            $this->getDeliverablesChildren($result, $deliverable->id);
        }
    }

    public function deleteDeliverable(int $deliverableId) : Collection
    {
        $dataForDelete = [];
        $deliverableForDelete = Deliverable::with('folder')->findOrFail($deliverableId); // si no existe arroja error
        $this->getDeliverablesChildren($dataForDelete, $deliverableId); // agregamos la data de los hijos que se van a borrar
        $deliverableForDelete->delete(); // se encarga de borrado logico y de las carpetas recursivamente(hijos y carpetas hijos)
        return collect($dataForDelete);
    }
}
