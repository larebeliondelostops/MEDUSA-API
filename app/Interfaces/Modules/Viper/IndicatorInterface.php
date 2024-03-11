<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

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
     * @param Collection $indicator Collection con la información del indicador a ser creado.
     * @return Collection Collection del indicador creado.
     */
    public function createNewIndicator(Collection $indicator): Collection;

    /**
     * Actualiza un indicador existente.
     *
     * @param Collection $indicator Collection que contiene la información del indicador a ser actualizado.
     * @param int $id El identificador único del indicador a ser actualizado.
     * @return Collection Collection del indicador actualizado.
     */
    public function updateIndicator(Collection $indicator, int $id): Collection;

    /**
     * Obtiene todos los indicadores asociados a un producto específico.
     *
     * @param int $productId El identificador único del producto.
     * @return Collection Collection de Collections asociados al indicador.
     */
    public function getAllIndicatorsByProduct(int $productId): Collection;

    /**
     * Obtiene los detalles de un indicador específico.
     *
     * @param int $id El identificador único del indicador.
     * @return Collection Collection de la información del indicador.
     */
    public function getIndicator(int $id): Collection;

    /**
     * Elimina un indicador específico.
     *
     * @param int $id El identificador único del indicador a ser eliminado.
     * @return Collection Collection del indicador eliminado.
     */
    public function deleteIndicator(int $id): Collection;
}
