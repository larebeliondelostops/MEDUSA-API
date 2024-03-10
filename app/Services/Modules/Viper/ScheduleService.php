<?php

namespace App\Services\Modules\Viper;
use App\DTOs\Viper\EDT\EDTDTO;
use App\DTOs\Viper\Product\ProductSummaryDTO;
use App\DTOs\Viper\Product\ProductSummaryWithDeliverablesDTO;
use App\Interfaces\Modules\Viper\DeliverableInterface;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Interfaces\Modules\Viper\ProjectInterface;
use App\Interfaces\Modules\Viper\ScheduleInterface;
use App\Interfaces\Modules\Viper\ScopeInterface;

/**
 * Servicio Cronograma.
 *
 * Esta servicio tiene como objeto definir todas las funcionalidades  de la lógica de negocio
 * necesarias para manejar los cronogramas de los proyectos.
 *
 * @package    App\Service\Viper
 * @author     Jorge Abella <j0rg3.4b3ll4@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ScheduleService implements ScheduleInterface
{
    private ProjectInterface $projectInterface;
    private ScopeInterface $scopeInterface;
    private ProductInterface $productInterface;
    private DeliverableInterface $deliverableInterface;

    public function __construct(
        ProjectInterface $projectInterface,
        ScopeInterface $scopeInterface,
        ProductInterface $productInterface,
        DeliverableInterface $deliverableInterface
    )
    {
        $this->projectInterface = $projectInterface;
        $this->scopeInterface = $scopeInterface;
        $this->productInterface = $productInterface;
        $this->deliverableInterface = $deliverableInterface;
    }

    public function generateProjectEDT($projectBpin) : array
    {
        $EDT = [];
        $projectDTO = $this->projectInterface->getProjectByBPIN($projectBpin);
        $projectScopeDTO = $this->scopeInterface->getScopeByProject($projectBpin);

        $EDT = new EDTDTO([
            'name' => ''.$projectDTO->bpin.' '.$projectDTO->name,
            'products' => array_map(
                fn (ProductSummaryDTO $productSummaryDTO) => new ProductSummaryWithDeliverablesDTO(
                    $productSummaryDTO->toArray() +
                    ['deliverables' => $this->deliverableInterface->getDeliverablesByProductId($productSummaryDTO->id)]
                ),
                $this->productInterface->getAllProductsSummaryByScope($projectScopeDTO->id)
            )
        ]);

        return [
            "EDT" => $EDT->toArray()
        ];
    }
}
