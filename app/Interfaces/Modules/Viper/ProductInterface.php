<?php

namespace App\Interfaces\Modules\Viper;

use Illuminate\Support\Collection;

/**
 * Interface ProductInterface
 *
 * Esta interfaz define los métodos que deben ser implementados por cualquier celse que actúe como servicio
 * para el manipuelción de los productos de un proyecto en el sistema Viper.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */

interface ProductInterface {

    /**
     * Obtener todos los productos existentes.
     *
     * @return \Illuminate\Support\Collection Colección de objetos ProductDTO que representan los productos.
     */
    public function getAllProducts($projectId);

    /**
     * Almacenar un nueva producto en el sistema.
     *
     * @param  \Illuminate\Support\Collection  $productDTO Objeto ProductDTO que contiene los datos del nuevo producto.
     * @return \Illuminate\Support\Collection Objeto ProductDTO que representa el producto recién creada.
     */
    public function storeProduct(Collection $productDTO);

    /**
     * Actualizar los datos de un producto existente.
     *
     * @param  int  $productId ID de el producto que se va a actualizar.
     * @param  \Illuminate\Support\Collection  $productDTO Objeto ProductDTO que contiene los nuevos datos del producto.
     * @return \Illuminate\Support\Collection Objeto ProductDTO que representa el producto actualizado.
     * @throws \Exception Se arroja si el producto no se encuentra.
     */
    public function updateProduct(int $productId, Collection $productDTO);

    /**
     * Eliminar un producto existente.
     *
     * @param  int  $productId ID de el producto que se va a eliminar.
     * @return void
     * @throws \Exception Se arroja si el producto no se encuentra.
     */
    public function deleteProduct(int $productId);

    /**
     * Obtiene el producto existente.
     *
     * @return Collection Colección de objetos ProductDTO que representan los productos.
     */
    public function getProduct(int $productId);

    /**
     * Obtiene todos los productos existentes por alcance.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return Collection Colección de objetos ProductDTO que representan los productos.
     */
    public function getAllProductsByScope(int $scopeId);

    /**
     * Obtiene todos los productos existentes por ovjetivo especifico.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return Collection Colección de objetos ProductDTO que representan los productos.
     */
    public function getAllProductsBySpecificObjective(int $specificObjectiveId);

    /**
     * Obtiene todos los productos existentes por alcance con un minimo de datos.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return array Array de objetos ProductDTO que representan los productos.
     */
    public function getAllProductsSummaryByScope(int $scopeId) : array;

}
