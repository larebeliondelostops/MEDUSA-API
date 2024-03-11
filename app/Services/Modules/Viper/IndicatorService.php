<?php

namespace App\Services\Modules\Viper;

use Illuminate\Support\Collection;
use App\Interfaces\Modules\Viper\IndicatorInterface;
use App\Models\Modules\Viper\Indicator;
use Exception;

/**
 * Servicio de manejo de indicadores en el sistema Viper.
 *
 * Implementa la interfaz IndicatorInterface para definir las operaciones necesarias
 * para la gestión de indicadores.
 *
 * @package App\Services\Modules\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class IndicatorService implements IndicatorInterface
{

    /**
     * Crea un nuevo indicador en el sistema.
     *
     * @param Collection $indicator Datos del indicador a crear.
     * @return Collection Datos del nuevo indicador creado.
     */
    public function createNewIndicator(Collection $indicator): Collection
    {
        $newIndicator = new Indicator($indicator->toArray());
        $newIndicator->save();

        return collect($indicator);
    }

    /**
     * Actualiza un indicador existente en el sistema.
     *
     * @param Collection $indicator Datos actualizados del indicador.
     * @param int $id Identificador del indicador a actualizar.
     * @return Collection Datos del indicador actualizado.
     */
    public function updateIndicator(Collection $indicator, int $id): Collection
    {
        $indicatorUpdate = Indicator::findOrFail($id);
        $indicatorUpdate->fill($indicator->toArray());
        $indicatorUpdate->save();

        return collect($indicatorUpdate);
    }

    /**
     * Obtiene todos los indicadores asociados a un producto específico.
     *
     * @param int $productId Identificador del producto.
     * @return Collection Colección de Indicatores representando los indicadores asociados al producto.
     */
    public function getAllIndicatorsByProduct(int $productId): Collection
    {
        $indicatorGot = Indicator::with('measurementUnit')->where('product_id', $productId)->get();
    
        $indicators = $indicatorGot->transform(
            function (Indicator $indicator)
            {
                return collect($indicator);
            }
        );
        return $indicators;
    }

    /**
     * Obtiene los datos de un indicador específico por su identificador.
     *
     * @param int $id Identificador del indicador.
     * @return Collection Datos del indicador solicitado.
     */
    public function getIndicator(int $id): Collection
    {
        $indicator = Indicator::with('measurementUnit')->findOrFail($id);

        return collect($indicator);
    }

    /**
     * Elimina un indicador específico por su identificador.
     *
     * @param int $id Identificador del indicador a eliminar.
     * @return Collection Datos del indicador eliminado.
     */
    public function deleteIndicator(int $id): Collection
    {
        $indicator = Indicator::findOrFail($id);
        $indicator->delete();

        return collect($indicator);
    }
}
