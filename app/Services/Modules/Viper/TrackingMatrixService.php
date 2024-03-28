<?php 

namespace App\Services\Modules\Viper;
use App\Interfaces\Modules\Viper\Deliverable\DeliverableInterface;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Interfaces\Modules\Viper\ProjectInterface;
use App\Interfaces\Modules\Viper\ScopeInterface;
use App\Interfaces\Modules\Viper\SpecificObjectiveInterface;
use App\Interfaces\Modules\Viper\TrackingMatrixInterface;

class TrackingMatrixService implements TrackingMatrixInterface
{
    private ProjectInterface $projectInterface;
    private ScopeInterface $scopeInterface;
    private SpecificObjectiveInterface $specificObjectiveInterface;
    private ProductInterface $productInterface;
    private DeliverableInterface $deliverableInterface;

    public function __construct(
        ProjectInterface $projectInterface,
        ScopeInterface $scopeInterface,
        SpecificObjectiveInterface $specificObjectiveInterface,
        ProductInterface $productInterface,
        DeliverableInterface $deliverableInterface
    )
    {
        $this->projectInterface = $projectInterface;
        $this->scopeInterface = $scopeInterface;
        $this->specificObjectiveInterface = $specificObjectiveInterface;
        $this->productInterface = $productInterface;
        $this->deliverableInterface = $deliverableInterface;
    }

    public function getTrackingMatrixOfProject(string $projectBpin) : TrackingMatrixDetailDTO
    {
        $projectDTO = $this->projectInterface->getProjectByBPIN($projectBpin);
        $scopeDTO = $this->scopeInterface->getScopeByProject($projectBpin);

        $trackingMatrix = new TrackingMatrixDetailDTO([
            "projectBpin" => $projectDTO->bpin,
            "projectName" => $projectDTO->name,
            "specificObjectives" => array_map(
                function (array $specificObjetive) //toca que fanor corrija porque retorna un collection
                {
                    return new SpecificObjectiveWithProductsDTO (
                        $specificObjetive +
                        [
                            "products" =>
                            array_map(
                                function (ProductDetailDTO $productDTO)
                                {
                                    return new ProductSummaryWithDeliverablesDTO(
                                        $productDTO->toArray() +
                                        [
                                            'deliverables' =>
                                            $this->deliverableInterface->getDeliverablesByProductId($productDTO->id)
                                        ]
                                    );
                                },
                                $this->productInterface->getAllProductsBySpecificObjective($specificObjetive['id'])['products']
                            )
                        ]
                    );
                },
                $this->specificObjectiveInterface->getAllSpecificObjectiveByScope($scopeDTO->id)
            )
        ]);
        return $trackingMatrix;
    }
}