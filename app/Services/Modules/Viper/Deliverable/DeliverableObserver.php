<?php 

namespace App\Services\Modules\Viper\Deliverable;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Models\Modules\Viper\Deliverable;
use Illuminate\Support\Facades\DB;

class DeliverableObserver
{
    private ProductInterface $productInterface;
    private array $dataDeliverablesForActivity = []; // contiene la data de los deliverables requeridos en un formato recursivo.
    private array $dataDeliverablesForUpdate = [];  // contiene referencias a datos de los deliverables en el formato recursivo pero organizado para actualizar la data.

    public function __construct(
        ProductInterface $productInterface
    )
    {
        $this->productInterface = $productInterface;
    }

    public function created(Deliverable $deliverable)
    {
        $this->productInterface->updateProductDeliverableQuantity($deliverable->product_id);
    }
}