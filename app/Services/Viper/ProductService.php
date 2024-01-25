<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Product\ProductDTO;
use App\Interfaces\Viper\ProductInterface;
use App\Models\Viper\Product;
use Illuminate\Support\Collection;

/**
 * Servicio para manejar operaciones relacionadas con las etaptas de los proyectos.
 *
 * Este servicio implementa el interfaz ProductInterface y es responsable
 * de realizar operaciones como el creación, actualización, recuperación
 * y eliminación dels unidades de medidas en los proyectos.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ProductService implements ProductInterface
{
    /**
     * Obtiene todas las unidades de medidas existentes.
     *
     * @return Collection|ProductDTO[] Colección de objetos ProductDTO que representan las unidades de medidas.
     */
    public function getAllProducts()
    {
        $products = Product::all();
        $productDTOs = $products->transform(function ($product) {
            return new ProductDTO($product->toArray());
        });

        return $productDTOs;
    }

    /**
     * Obtiene el producto existente.
     *
     * @return Collection|ProductDTO[] Colección de objetos ProductDTO que representan las unidades de medidas.
     */
    public function getProduct($productId)
    {
        $product = Product::findOrFail($productId);
        $productDTO =new ProductDTO($product->toArray());

        return $productDTO;
    }

    /**
     * Almacena un nuevo producto en el base de datos.
     *
     * @param ProductDTO $productDTO Objeto ProductDTO que contiene los datos del nuevo producto.
     * @return ProductDTO Objeto ProductDTO que representa el producto recién creada.
     */
    public function storeProduct(ProductDTO $productDTO)
    {
        // Crea una nueva instancia del modelo Product y guarda los datos
        $product = new Product();
        $product->fill($productDTO->toArray());
        $product->save();

        return new ProductDTO($product->toArray());
    }

    /**
     * Actualiza los datos de un producto existente.
     *
     * @param int $productId ID del producto que se va a actualizar.
     * @param ProductDTO $productDTO Objeto ProductDTO que contiene los nuevos datos del producto.
     * @return ProductDTO Objeto ProductDTO que representa el producto actualizada.
     * @throws \Exception Se arroja si el producto no se encuentra.
     */
    public function updateProduct($productId, string $newName)
    {
        // Encuentra el producto por su ID
        $product = Product::findOrFail($productId);
        
        // Actualiza los datos del producto
        $product->name = $newName;

        $product->save();

        return new ProductDTO($product->toArray()); 

    }

    /**
     * Elimina un producto existente.
     *
     * @param int $productId ID del producto que se va a eliminar.
     * @throws \Exception Se arroja si el producto no se encuentra.
     */
    public function deleteProduct($productId)
    {
        // Encuentra el producto por su ID y elimínala
        $product = Product::findOrFail($productId);
        $product->delete();
    }

}
