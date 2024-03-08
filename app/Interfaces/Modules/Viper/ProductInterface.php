<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\Product\ProductDTO;
use App\DTOs\Viper\Product\ProductSummaryDTO;

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
     * @return \Illuminate\Support\Collection|ProductDTO[] Colección de objetos ProductDTO que representan los productos.
     */
    public function getAllProducts();

    /**
     * Almacenar un nueva producto en el sistema.
     *
     * @param  \App\DTOs\Viper\Product\ProductDTO  $productDTO Objeto ProductDTO que contiene los datos del nuevo producto.
     * @return \App\DTOs\Viper\Product\ProductDTO Objeto ProductDTO que representa el producto recién creada.
     */
    public function storeProduct(ProductDTO $productDTO);

    /**
     * Actualizar los datos de un producto existente.
     *
     * @param  int  $productId ID de el producto que se va a actualizar.
     * @param  \App\DTOs\Viper\Product\ProductDTO  $productDTO Objeto ProductDTO que contiene los nuevos datos del producto.
     * @return \App\DTOs\Viper\Product\ProductDTO Objeto ProductDTO que representa el producto actualizado.
     * @throws \Exception Se arroja si el producto no se encuentra.
     */
    public function updateProduct($productId, ProductDTO $productDTO);

    /**
     * Eliminar un producto existente.
     *
     * @param  int  $productId ID de el producto que se va a eliminar.
     * @return void
     * @throws \Exception Se arroja si el producto no se encuentra.
     */
    public function deleteProduct($productId);

    /**
     * Obtiene el producto existente.
     *
     * @return Collection|ProductDTO[] Colección de objetos ProductDTO que representan los productos.
     */
    public function getProduct($productId);

    /**
     * Obtiene todos los productos existentes por alcance.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return Collection|ProductDTO[] Colección de objetos ProductDTO que representan los productos.
     */
    public function getAllProductsByScope(int $scopeId);

    /**
     * Obtiene todos los productos existentes por ovjetivo especifico.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return Collection|ProductDTO[] Colección de objetos ProductDTO que representan los productos.
     */
    public function getAllProductsBySpecificObjective(int $specificObjectiveId);

    /**
     * Obtiene todos los productos existentes por alcance con un minimo de datos.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return ProductSummaryDTO[] Array de objetos ProductDTO que representan los productos.
     */
    public function getAllProductsSummaryByScope(int $scopeId) : array;

}
