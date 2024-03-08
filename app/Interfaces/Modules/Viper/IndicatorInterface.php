<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Indicator\IndicatorDTO;

/**
 * Interfaz para gestionar operaciones relacionadas con los indicadores en el sistema Viper.
 *
 * @package App\Interfaces\Viper
 * @author     Jhon Orjuela <jhonfanor.06.2000@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
interface IndicatorInterface {

    /**
     * Crea un nuevo indicador.
     *
     * @param IndicatorDTO $indicatorDTO La información del indicador a ser creado.
     * @return IndicatorDTO El indicador creado.
     */
    public function createNewIndicator(IndicatorDTO $indicatorDTO): IndicatorDTO;

    /**
     * Actualiza un indicador existente.
     *
     * @param IndicatorDTO $indicatorDTO La información del indicador a ser actualizado.
     * @param int $id El identificador único del indicador a ser actualizado.
     * @return IndicatorDTO El indicador actualizado.
     */
    public function updateIndicator(IndicatorDTO $indicatorDTO, int $id): IndicatorDTO;

    /**
     * Obtiene todos los indicadores asociados a un producto específico.
     *
     * @param int $productId El identificador único del producto.
     * @return array Un array de objetos IndicatorDTO.
     */
    public function getAllIndicatorsByProduct(int $productId): array;

    /**
     * Obtiene los detalles de un indicador específico.
     *
     * @param int $id El identificador único del indicador.
     * @return IndicatorDTO La información del indicador.
     */
    public function getIndicator(int $id): IndicatorDTO;

    /**
     * Elimina un indicador específico.
     *
     * @param int $id El identificador único del indicador a ser eliminado.
     * @return IndicatorDTO El indicador eliminado.
     */
    public function deleteIndicator(int $id): IndicatorDTO;
}
