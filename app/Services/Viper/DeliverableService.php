<?php

namespace App\Services\Viper;
use App\DTOs\Viper\Deliverable\DeliverableDetailDTO;
use App\DTOs\Viper\Deliverable\DeliverableRequestDTO;
use App\DTOs\Viper\Folder\FolderDTO;
use App\Interfaces\Viper\DeliverableInterface;
use App\Interfaces\Viper\FolderInterface;
use App\Interfaces\Viper\ProductInterface;
use App\Models\Viper\Deliverable;

class DeliverableService implements DeliverableInterface
{
    private const ID_STAGE_EJECUCION = 4;
    private FolderInterface $folderInterface;
    private ProductInterface $productInterface;

    public function __construct(FolderInterface $folderInterface, ProductInterface $productInterface)
    {
        $this->folderInterface = $folderInterface;
        $this->productInterface = $productInterface;
    }

    public function createNewDeliverable(DeliverableRequestDTO $deliverableDTO, int  $projectId) : DeliverableRequestDTO
    {
        $productDTO = $this->productInterface->getProduct($deliverableDTO->product_id);
        $folderDTO = $this->
    }

    private function adjustDataAndSave(array &$deliverables, array &$result, ?int $fatherDeliverableId = null ) : void
    {
        foreach($deliverables as &$deliverable)
        {
            $deliverableDTO = new DeliverableRequestDTO($deliverable);
            $productDTO = $this->productInterface->getProduct($deliverableDTO->product_id); // se obtiene la data del producto al que pertenece el entregable
            $folderForDeliverableDTO = $this->folderInterface->createNewFolder(
                new FolderDTO(
                    [
                        'name' => $deliverableDTO->number.''.$deliverableDTO->name,
                        'stage_id' => self::ID_STAGE_EJECUCION, // id de etapa de ejecucion,
                        'project_id' => "8110", // actualizar cuando se actualice product
                        'higher_folder_id' => $productDTO->folder_id
                    ]
                )
            );

            $deliverableDTO->folder_id = $folderForDeliverableDTO->id;
            $deliverableDTO->deliverable_id = $fatherDeliverableId;

            $deliverableModel = new Deliverable(
                $deliverableDTO->toArray()
            );
            $deliverableModel->save();

            $deliverableDTO->fill($deliverableModel->toArray()); // nueva data para deliverableDTO con la data almacenada
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

    }

    public function getDeliverablesByProductId(int $productId) : array
    {

    }

    public function updateDeliverable(string $name, int $deliverableId) : DeliverableRequestDTO
    {

    }

    public function deleteDeliverable(int $deliverableId) : DeliverableDetailDTO
    {

    }
}
