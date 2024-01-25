<?php

namespace App\Http\Controllers\Viper;

use App\Http\Request\Viper\ProductRequest;
use App\DTOs\Viper\Product\ProductDTO;
use App\Interfaces\Viper\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controlador que maneja todo lo que tiene que ver con los productos de un proyecto
 *
 * Controlador que maneja la logica para la creacion, actualizacion, eliminacion y consulta de los productos en los proyectos de Viper
 *
 * @package    App\Http\Controllers\Viper
 * @copyright  2024 Ignicion S.A.S.
 * @author     Daniel Alferez <dan.alferez1@gmail.com>
 * @version    v1.0.0
 */

class ProductController extends BaseController
{
    private ProductInterface $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        parent::__construct(); // Se tiene que llamar al contructor padre para que se configure correctamente el BaseController
        $this->productInterface = $productInterface;
    }

     /**
     * Mostrar una lista de productos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = $this->productInterface->getAllProducts();

            return response()->json([
                'data' => $products,
            ], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }

    /**
     * Almacenar una nuevo producto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            // Valida y procesa los datos del formulario
            $validatedData = $request->validated();

            // Crea un nuevo ProductDTO con los datos del formulario
            $productDTO = new ProductDTO($validatedData);

            // Llama al servicio para almacenar la nuevo producto
            $newProduct = $this->productInterface->storeProduct($productDTO);

            // Retorna la respuesta JSON con el nuevo producto creada
            return response()->json([
                'message' => 'producto creado correctamente',
                'data' => $newProduct,
            ], 201);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Actualizar el nombre de un producto especificado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        try {
            // Valida y procesa los datos del formulario
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Llama al servicio para actualizar el producto
            $updatedProduct = $this->productInterface->updateProduct($productId, $validatedData['name']);

            // Retorna la respuesta JSON con el producto actualizado
            return response()->json([
                'message' => 'producto actualizado correctamente',
                'data' => $updatedProduct,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


     /**
     * Mostrar una lista de productos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        try {
            $product = $this->productInterface->getProduct($productId);
            return response()->json([
                'data' => $product,
            ], 200);
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }


    /**
     * Eliminar el recurso especificado del almacenamiento.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        try {
            // Llama al servicio para eliminar el producto
            $this->productInterface->deleteProduct($productId);
            return response()->json(
                ['message' => 'producto eliminado correctamente']
            );
            
        } catch (\Exception $exception) {
            return $this->handleException($exception);
        }
    }
}
