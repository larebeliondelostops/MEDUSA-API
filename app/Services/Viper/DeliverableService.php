<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Deliverable\DeliverableDetailDTO;
use App\DTOs\Viper\Deliverable\DeliverableRequestDTO;
use App\DTOs\Viper\Folder\FolderDTO;
use App\Interfaces\Viper\DeliverableInterface;
use App\Interfaces\Viper\FolderInterface;
use App\Models\Viper\Deliverable;
use Illuminate\Support\Collection;

class DeliverableService implements DeliverableInterface
{
    private FolderInterface $folderInterface;

    public function __construct(FolderInterface $folderInterface)
    {
        $this->folderInterface = $folderInterface;
    }

    private function getAmountOfDeliverablesByProductId(int $product_id) : int
    {
        return Deliverable::where('product_id', $product_id)->count();
    }

    private function getAmountOfDeliverablesByDeliverableId(int $deliverable_id) : int
    {
        return Deliverable::where('deliverable_id', $deliverable_id)->count();
    }

    private function loadChildDeliverablesRecursively(Collection $deliverables) : Collection
    {
        return $deliverables->map(function (Deliverable $deliverable) {
            $deliverableData = $deliverable->toArray();
            $deliverableData['child_deliverables'] = [];

            if ($deliverable->childDeliverables->isNotEmpty()) {
                // Convertir cada childDeliverable a DTO y luego a un array
                $childDTOs = $this->loadChildDeliverablesRecursively($deliverable->childDeliverables);
                $deliverableData['child_deliverables'] = $childDTOs->toArray();
            }

            return new DeliverableDetailDTO($deliverableData);
        });
    }
    public function createNewDeliverable(DeliverableRequestDTO $deliverableRequestDTO, int $projectId) : DeliverableRequestDTO
    {
        $newDeliverable = new Deliverable(
            $deliverableRequestDTO->toArray()
        );
        $newDeliverable->load('parentDeliverable')->load('product');
        $folder = $this->folderInterface->createNewFolder(
            new FolderDTO(
                [
                    'name' => $deliverableRequestDTO->name,
                    'stage_id' => 4,
                    'project_id' => $projectId,
                    'higher_folder_id' => (is_null($deliverableRequestDTO->deliverable_id)?
                                            $newDeliverable->product->folder_id:
                                            $newDeliverable->parentDeliverable->folder_id
                                          ),
                                            ])
        );

        $newDeliverable->folder_id = $folder['id'];

        if (is_null($deliverableRequestDTO->deliverable_id))
        {
            $newDeliverable->load('product');
            $newDeliverable->number =
                        ''.$newDeliverable->product->number.
                        '.'.$this->getAmountOfDeliverablesByProductId($newDeliverable->product_id)+1;
        }
        else
        {
            $newDeliverable->load('parentDeliverable');
            $newDeliverable->number =
                        ''.$newDeliverable->parentDeliverable->number.
                        '.'.$this->getAmountOfDeliverablesByDeliverableId($newDeliverable->deliverable_id)+1;
        }
        $newDeliverable->save();
        return new DeliverableRequestDTO($newDeliverable->toArray());
    }

    public function getAllDeliverables() : array
    {
        $parentDeliverables = Deliverable::with('childDeliverables')->where("deliverable_id", null)->get();
        return $this->loadChildDeliverablesRecursively($parentDeliverables)->toArray();
    }

    public function getDeliverablesByProductId(int $productId) : array
    {
        $parentDeliverables = Deliverable::with('childDeliverables')
            ->where("deliverable_id", null)
            ->where("product_id", $productId)
            ->orderBy('number')
            ->get();
        return $this->loadChildDeliverablesRecursively($parentDeliverables)->toArray();
    }

    public function updateDeliverable(string $newName, int $deliverableId) : DeliverableRequestDTO
    {
        $deliverableGot = Deliverable::findOrFail($deliverableId);
        $deliverableGot->name = $newName;
        $deliverableGot->save();
        return new DeliverableRequestDTO($deliverableGot->toArray());
    }

    private function getAllDeliverablesByDeliverableId(int $deliverableId) : array
    {
        $parentDeliverables = Deliverable::with('childDeliverables')
            ->where("deliverable_id", $deliverableId)
            ->get();
        return $this->loadChildDeliverablesRecursively($parentDeliverables)->toArray();
    }

    private function loadNewNumberDeliverables(array $deliverables, string $numberDeleted, string $numberFather)
    {
        $index = 0;
        $deliverablesUpdated = array_map(
            function (DeliverableDetailDTO $deliverable) use ($numberDeleted, &$index, $numberFather)
            {
                $index++;
                if ($numberDeleted > $deliverable->number) return $deliverable;
                else
                {
                    $deliverable->number = $numberFather . '.' . $index ;

                    if (count($deliverable->child_deliverables)>0) $deliverable->child_deliverables = $this->loadNewNumberDeliverables($deliverable->child_deliverables, 0, $deliverable->number);
                    // Actualizamos la informacion de la db
                    $deliverableUpdate = Deliverable::findOrFAil($deliverable->id);
                    $deliverableUpdate->number = $deliverable->number;
                    $deliverableUpdate->save();

                    return $deliverable;
                }
            },
            $deliverables
        );
        return $deliverablesUpdated;
    }

    public function deleteDeliverable(int $deliverableId) //: DeliverableRequestDTO
    {
        $deliverableGot = Deliverable::findOrFail($deliverableId);
        $deliverableDeletedDTO = new DeliverableRequestDTO($deliverableGot->toArray());
        $deliverableGot->delete();

        $deliverablesSiblings = (is_null($deliverableDeletedDTO->deliverable_id) ?
                                $this->getDeliverablesByProductId($deliverableDeletedDTO->product_id):
                                $this->getAllDeliverablesByDeliverableId($deliverableDeletedDTO->deliverable_id));

        //divido el number en partes para obtener el number del padre
        $sections = explode('.', $deliverableDeletedDTO->number);
        //elimino el ultimo numero de number
        array_pop($sections);
        //sections para obtener el number del father del elemento a eliminar
        $numberFather = implode('.', $sections);

        // actualizo todos los numbers que se ven afectados por eliminar el entregable
        $this->loadNewNumberDeliverables($deliverablesSiblings,
                                                $deliverableDeletedDTO->number,
                                                $numberFather);

        return $deliverableDeletedDTO;
    }
}
