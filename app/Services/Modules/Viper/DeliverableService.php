<?php

namespace App\Services\Modules\Viper;
use App\DTOs\Viper\Activity\ActivityDTO;
use App\DTOs\Viper\Deliverable\DeliverableDetailDTO;
use App\DTOs\Viper\Deliverable\DeliverableDetailFolderDTO;
use App\DTOs\Viper\Deliverable\DeliverableRequestDTO;
use App\DTOs\Viper\Folder\FolderDTO;
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

    public function createNewDeliverable(Collection $deliverableDTO) : Collection
    {
        $folderDTO = $this->folderInterface->createNewFolder(
            collect(
                [
                    'name' => $deliverableDTO->number .'. '.$deliverableDTO->name,
                    'higher_folder_id' => (
                        is_null($deliverableDTO->folder_id) ?
                        ($this->productInterface->getProduct($deliverableDTO->product_id))->folder->id :
                        $deliverableDTO->folder_id
                    ),
                ]
            )
        );
        $deliverableDTO->folder_id = $folderDTO->id;
        $deliverable = collect($deliverableDTO->toArray());
        $deliverable->save();
        return $deliverable;
    }

    /**
     * Metodo diseñado para cuando se asigne una actividad a un entregable, se llame a este metodos y este actulice el incremento
     * al entregable al que se asigno la actividad y a la vez se actualice la data de sus entregables padres.
     */
    public function updateIncrementDataWithChildrenActivities(?int $deliverableId, Collection $activityDTO)
    {
        if(!is_null($deliverableId))
        {
            $deliverable = Deliverable::findOrFail($deliverableId);
            $deliverable->activity_quantity += 1;
            $deliverable->value += $activityDTO['total_value'];
            $deliverable->save();
            $this->updateIncrementDataWithChildrenActivities($deliverable->deliverable_id, $activityDTO);
        }
        else
            return;
    }

      /**
     * Metodo diseñado para cuando se asigne una actividad a un entregable, se llame a este metodos y este actulice el decremento
     * al entregable al que se asigno la actividad y a la vez se actualice la data de sus entregables padres.
     */
    public function updateDecrementDataWithChildrenActivities(?int $deliverableId, Collection $activityDTO)
    {
        if(!is_null($deliverableId))
        {
            $deliverable = Deliverable::findOrFail($deliverableId);
            $deliverable->activity_quantity -= 1;
            $deliverable->value -= $activityDTO['total_value'];
            $deliverable->save();
            $this->updateDecrementDataWithChildrenActivities($deliverable->deliverable_id, $activityDTO);
        }
        else
            return;
    }

    private function adjustDataAndSave(array &$deliverables, array &$result, ?int $fatherDeliverableId = null ) : void
    {
        foreach($deliverables as $deliverable)
        {
            $deliverableDTO = collect($deliverable);
            $deliverableDTO->deliverable_id = $fatherDeliverableId;
            $deliverableDTO = $this->createNewDeliverable($deliverableDTO);
            if (count($deliverable['deliverables']) > 0)
                $this->adjustDataAndSave($deliverable['deliverables'], $result, $deliverableDTO->id);

            array_push($result, $deliverableDTO); // se agrega el dato almacenado al array de resultado
        }
    }

    public function createMultipleDeliverables(array $deliverablesDTO) : array
    {
        $result = [];
        $this->adjustDataAndSave($deliverablesDTO, $result);
        return  $result;
    }

    public function getAllDeliverables() : array
    {
        $deliverables = Deliverable::all();
        return $deliverables->toArray();
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

    public function getDeliverablesByProductId(int $productId) : array
    {
        $result = []; // array para guardar los deliverables
        $this->getAndAjustData($result, $productId);
        return $result;
    }

    public function updateDeliverable(Collection $deliverableUpdateDTO, int $deliverableId) : Collection
    {
        $delivarableForUpdate = Deliverable::findOrFail($deliverableId);
        $delivarableForUpdate->fill([
            'number' => $deliverableUpdateDTO->number,
            'name' => $deliverableUpdateDTO->name
        ]);
        $delivarableForUpdate->save(); // Se actualiza la data del entregable

        $deliverableUpdateDTO->fill($delivarableForUpdate->toArray()); // se llena el objeto con los datos actualizados

        $deliverableUpdateDTO->folder = $this->folderInterface->updateFolderName(
            $delivarableForUpdate->folder_id,
            $delivarableForUpdate->number.'. '.$delivarableForUpdate->name);

        return $deliverableUpdateDTO;
    }

    public function getDeliverablesChildren(array &$result, int $fatherDeliverableId)
    {
        $deliverables = Deliverable::with('folder')->where('deliverable_id', $fatherDeliverableId)->get();
        foreach($deliverables as $deliverable)
        {
            $this->getDeliverablesChildren($result, $deliverable->id);
        }
    }

    public function deleteDeliverable(int $deliverableId) : array
    {
        $dataForDelete = [];
        $deliverableForDelete = Deliverable::with('folder')->findOrFail($deliverableId); // si no existe arroja error
        $this->getDeliverablesChildren($dataForDelete, $deliverableId); // agregamos la data de los hijos que se van a borrar
        $deliverableForDelete->delete(); // se encarga de borrado logico y de las carpetas recursivamente(hijos y carpetas hijos)
        return $dataForDelete;
    }
}
