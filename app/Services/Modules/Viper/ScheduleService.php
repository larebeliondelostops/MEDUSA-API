<?php

namespace App\Services\Modules\Viper;
use App\Interfaces\Modules\Viper\DeliverableInterface;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Interfaces\Modules\Viper\ProjectInterface;
use App\Interfaces\Modules\Viper\ScheduleInterface;
use App\Interfaces\Modules\Viper\ScopeInterface;
use Illuminate\Support\Collection;

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

    public function generateProjectEDT($projectBpin) : Collection
    {
        $EDT = [];
        $projectData = $this->projectInterface->getProjectByBPIN($projectBpin);
        $projectScopeData = $this->scopeInterface->getScopeByProject($projectBpin);

        $EDT = collect([
            'name' => ''.$projectData['bpin'].' '.$projectData['name'],
            'products' => array_map(
                fn (array $productSummaryData) =>
                    $productSummaryData +
                    ['deliverables' => $this->deliverableInterface->getDeliverablesByProductId($productSummaryData['id'])],
                $this->productInterface->getAllProductsSummaryByScope($projectScopeData['id'])
            )
        ]);

        return collect([
            "EDT" => $EDT->toArray()
        ]);
    }
}
