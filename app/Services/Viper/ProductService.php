<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Folder\FolderDTO;
use App\DTOs\Viper\MeasurementUnit\MeasurementUnitDTO;
use App\DTOs\Viper\Product\ProductDetailDTO;
use App\DTOs\Viper\Product\ProductDTO;
use App\DTOs\Viper\SpecificObjective\SpecificObjectiveDTO;
use App\Interfaces\Viper\FolderInterface;
use App\Interfaces\Viper\ProductInterface;
use App\Models\Viper\Folder;
use App\Models\Viper\Product;
use App\Models\Viper\Scope;
use App\Models\Viper\SpecificObjective;
use Illuminate\Support\Collection;

/**
 * Servicio para manejar operaciones relacionadas con los etaptas de los proyectos.
 *
 * Este servicio implementa el interfaz ProductInterface y es responsable
 * de realizar operaciones como el creación, actualización, recuperación
 * y eliminación dels productos en los proyectos.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class ProductService implements ProductInterface
{

    private FolderInterface $folderInterface;

    public function __construct(FolderInterface $folderInterface)
    {
        $this->folderInterface = $folderInterface;
    }

    /**
     * Obtiene todos los productos existentes .
     *
     * @return Collection|ProductDTO[] Colección de objetos ProductDTO que representan los productos.
     */
    public function getAllProducts()
    {
        $products = Product::with('measurementUnit', 'specificObjective', 'folder')->get();
        
        $productDTOs = $products->transform(function ($product) {
            $data = $product->toArray();
            $data['folder'] = new FolderDTO($data['folder']);
            $data['measurement_unit'] = new MeasurementUnitDTO($data['measurement_unit']);
            $data['specific_objective'] = new SpecificObjectiveDTO($data['specific_objective']);
            return new ProductDetailDTO($data);
        });
        
        return $productDTOs;
    }


    /**
     * Obtiene todos los productos existentes por alcance.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return Collection|ProductDTO[] Colección de objetos ProductDTO que representan los productos.
     */
    public function getAllProductsByScope($scopeId)
    {
        $products = Product::with('measurementUnit', 'specificObjective', 'folder')
            ->whereHas('specificObjective', function ($query) use ($scopeId) {
                $query->where('scope_id', $scopeId);
            })
            ->get();

        $productDTOs = $products->transform(function ($product) {
            $data = $product->toArray();
            $data['folder'] = new FolderDTO($data['folder']);
            $data['measurement_unit'] = new MeasurementUnitDTO($data['measurement_unit']);
            $data['specific_objective'] = new SpecificObjectiveDTO($data['specific_objective']);
            return new ProductDetailDTO($data);
        });

        return $productDTOs;
    }


    /**
     * Obtiene el producto existente.
     *
     * @return Collection|ProductDTO[] Colección de objetos ProductDTO que representan los productos.
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
    
        // Obtiene el specificObjective correspondiente al specific_objective_id proporcionado
        $specificObjective = SpecificObjective::findOrFail($productDTO->specific_objective_id);
        $scope_id = $specificObjective->scope_id;

        $project = Scope::findOrFail($scope_id)->project_id;
    
        // Obtener todos los objetivos específicos de un scope_id
        $objSpecificObjects = SpecificObjective::where('scope_id', $scope_id)->get();
           
        // Obtener todos los productos de los objetivos específicos asociados al scope_id
        $productsObjSpecifics = Product::whereIn('specific_objective_id', $objSpecificObjects->pluck('id'))->get();
        $product_number = $productsObjSpecifics->max('number') + 1;

        // Verifica si el número ya existe en los productos asociados a los objetivos específicos
        if ($productDTO->number) {
            if ($productsObjSpecifics->where('number', $productDTO->number)->count() > 0) {
                // Si el número ya existe, puedes manejar aquí el error o la respuesta que desees
                throw new \Exception('Número ya existe en los productos asociados a los objetivos específicos', 422);
            }else{
                // Calcula el próximo número disponible para el nuevo producto
                $product->number = $productDTO->number;
            }
        }else{
            // Calcula el próximo número disponible para el nuevo producto
            $product->number = $product_number;
        }
        
        // Obtener la carpeta con project_id igual a $project y nombre 'Expediente Contrato de Interventoría'
        $folder = Folder::where('project_id', $project)
                ->where('name', 'Expediente Contrato de Interventoría')
                ->first();

        if ($folder->id) {
            $folderDTO = new FolderDTO([
                "name" =>  $product_number . '. ' . $productDTO->name,
                "stage_id" => 4,
                "project_id" => $project,
                "higher_folder_id" => $folder->id
            ]);                
            // Crear la carpeta y establecer la relación higherFolders si se proporciona higher_folder_id
            $result = $this->folderInterface->createNewFolder($folderDTO);
            $product->folder_id = $result['id'];
        } else {
            throw new \Exception('No se pudo asignar una carpeta al producto', 422);
        }
        
        // Guarda el producto en la base de datos
        $product->save();
        
        // Puedes retornar el DTO del producto recién creado si es necesario
        return new ProductDTO($product->toArray());
    } 
    /**
     * Actualiza los datos de un producto existente.
     *
     * @param int $productId ID del producto que se va a actualizar.
     * @param ProductDTO $productDTO Objeto ProductDTO que contiene los nuevos datos del producto.
     * @return ProductDTO Objeto ProductDTO que representa el producto actualizado.
     * @throws \Exception Se arroja si el producto no se encuentra o si el nuevo specificObjective no pertenece al mismo scope.
     */
    public function updateProduct($productId, ProductDTO $productDTO)
    {
        // Encuentra el producto por su ID
        $product = Product::findOrFail($productId);

        // Guarda el nombre y el número actuales del producto
        $oldName = $product->name;
        $oldNumber = $product->number;

        $specificObjective = SpecificObjective::findOrFail($productDTO->specific_objective_id);
        $scope_id = $specificObjective->scope_id;

        // Obtener todos los objetivos específicos de un scope_id
        $objSpecificObjects = SpecificObjective::where('scope_id', $scope_id)->get();
           
        // Obtener todos los productos de los objetivos específicos asociados al scope_id
        $productsObjSpecifics = Product::whereIn('specific_objective_id', $objSpecificObjects->pluck('id'))->get();

        if ($productsObjSpecifics->where('number', $productDTO->number)->count() > 0 && $oldNumber != $productDTO->number) {
            // Si el número ya existe, puedes manejar aquí el error o la respuesta que desees
            throw new \Exception('Número ya existe en los productos asociados a los objetivos específicos', 422);
        }

        $oldSpecificObjectiveId = $product->specific_objective_id;

        // Verifica si se está cambiando el specificObjective
        if ($productDTO->specific_objective_id && $oldSpecificObjectiveId !== $productDTO->specific_objective_id) {
            // Verifica si el nuevo specificObjective pertenece al mismo scope
            $newSpecificObjective = SpecificObjective::findOrFail($productDTO->specific_objective_id);
            $oldScopeId = SpecificObjective::findOrFail($oldSpecificObjectiveId)->scope_id;

            if ($newSpecificObjective->scope_id !== $oldScopeId) {
                throw new \Exception('El nuevo specificObjective no pertenece al mismo scope', 422);
            }
        }

        // Actualiza los datos del producto
        $product->fill($productDTO->toArray([is_null($productDTO->number) ? 'number' : '', 'folder_id']));
        $product->save();

        // Verifica si el nombre o el número ha cambiado
        if ($oldName !== $product->name || $oldNumber !== $product->number) {
            // Obtén la carpeta asociada al producto
            $folder = Folder::find($product->folder_id);

            if ($folder) {
                // Actualiza el nombre de la carpeta
                $folder->name = $product->number . '. ' . $product->name;
                $folder->save();
            } else {
                throw new \Exception('No se pudo encontrar la carpeta asociada al producto', 422);
            }
        }

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
         // Encuentra el producto por su ID
        $product = Product::findOrFail($productId);

        // Obtiene el folder asociado al producto
        Folder::findOrFail($product->folder_id);

        $this->folderInterface->deleteFolder($product->folder_id);

        // Elimina el producto
        $product->delete();

    }

}