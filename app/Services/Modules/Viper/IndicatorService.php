<?php

namespace App\Services\Modules\Viper;

use App\DTOs\Viper\Indicator\IndicatorDTO;
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
     * @param IndicatorDTO $indicatorDTO Datos del indicador a crear.
     * @return IndicatorDTO Datos del nuevo indicador creado.
     */
    public function createNewIndicator(IndicatorDTO $indicatorDTO): IndicatorDTO
    {
        $indicator = new Indicator($indicatorDTO->toArray());
        $indicator->save();

        return new IndicatorDTO($indicator->toArray());
    }

    /**
     * Actualiza un indicador existente en el sistema.
     *
     * @param IndicatorDTO $indicatorDTO Datos actualizados del indicador.
     * @param int $id Identificador del indicador a actualizar.
     * @return IndicatorDTO Datos del indicador actualizado.
     * @throws Exception Si el indicador no se encuentra.
     */
    public function updateIndicator(IndicatorDTO $indicatorDTO, int $id): IndicatorDTO
    {
        $indicator = Indicator::findOrFail($id);
        $indicator->fill($indicatorDTO->toArray());
        $indicator->save();

        return new IndicatorDTO($indicator->toArray());
    }

    /**
     * Obtiene todos los indicadores asociados a un producto específico.
     *
     * @param int $productId Identificador del producto.
     * @return array Colección de IndicatorDTO representando los indicadores asociados al producto.
     */
    public function getAllIndicatorsByProduct(int $productId): array
    {
        $indicators = Indicator::where('product_id', $productId)->get();
    
        $indicatorDTOs = $indicators->map(function ($indicator) {
            return new IndicatorDTO($indicator->toArray());
        })->all();
    
        return $indicatorDTOs;
    }

    /**
     * Obtiene los datos de un indicador específico por su identificador.
     *
     * @param int $id Identificador del indicador.
     * @return IndicatorDTO Datos del indicador solicitado.
     * @throws Exception Si el indicador no se encuentra.
     */
    public function getIndicator(int $id): IndicatorDTO
    {
        $indicator = Indicator::findOrFail($id);

        return new IndicatorDTO($indicator->toArray());
    }

    /**
     * Elimina un indicador específico por su identificador.
     *
     * @param int $id Identificador del indicador a eliminar.
     * @return IndicatorDTO Datos del indicador eliminado.
     * @throws Exception Si el indicador no se encuentra.
     */
    public function deleteIndicator(int $id): IndicatorDTO
    {
        $indicator = Indicator::findOrFail($id);
        $indicatorDTO = new IndicatorDTO($indicator->toArray());
        $indicator->delete();

        return $indicatorDTO;
    }
}
