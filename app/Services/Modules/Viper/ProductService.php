<?php

namespace App\Services\Modules\Viper;

use App\Exceptions\Modules\Viper\InterventoryFolderNotFoundException;
use App\Interfaces\Modules\Viper\FolderInterface;
use App\Interfaces\Modules\Viper\ProductInterface;
use App\Models\Modules\Viper\Folder;
use App\Models\Modules\Viper\Product;
use App\Models\Modules\Viper\Scope;
use App\Models\Modules\Viper\SpecificObjective;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
     * @return Collection Colección de objetos ProductData que representan los productos.
     */
    public function getAllProducts($projectId)
    {
        $scope = Scope::where('project_id', $projectId)->first();;
        if ($scope === null) {
            return null;
        }

        $scopeId = $scope->id;

        $products = Product::with('measurementUnit', 'specificObjective', 'folder')
            ->whereHas('specificObjective', function ($query) use ($scopeId) {
                $query->where('scope_id', $scopeId);
            })
            ->get();

        return collect($products);
    }

    /**
     * Obtiene todos los productos existentes por alcance.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return Collection Colección de objetos ProductData que representan los productos.
     */
    public function getAllProductsByScope($scopeId)
    {
        $products = Product::with('measurementUnit', 'specificObjective', 'folder')
            ->whereHas('specificObjective', function ($query) use ($scopeId) {
                $query->where('scope_id', $scopeId);
            })
            ->get();

        return collect($products);
    }


    /**
     * Obtiene el producto existente.
     *
     * @return Collection Colección de objetos ProductData que representan los productos.
     */
    public function getProduct(int $productId)
    {
        $product = Product::with('measurementUnit', 'specificObjective', 'folder')->findOrFail($productId);

        return collect($product);
    }

    /**
     * Almacena un nuevo producto en el base de datos.
     *
     * @param Collection $productData Objeto ProductData que contiene los datos del nuevo producto.
     * @return Collection Collection que representa el producto recién creada.
     */
    public function storeProduct(Collection $productData)
    {
        // Crea una nueva instancia del modelo Product y guarda los datos
        $product = new Product();
        $product->fill($productData->toArray());

        // Obtiene el specificObjective correspondiente al specific_objective_id proporcionado
        $specificObjective = SpecificObjective::findOrFail($product->specific_objective_id);
        
        $scope_id = $specificObjective->scope_id;

        $project = Scope::findOrFail($scope_id)->project_id;
        // Obtener todos los objetivos específicos de un scope_id
        $objSpecificObjects = SpecificObjective::where('scope_id', $scope_id)->get();

        // Obtener todos los productos de los objetivos específicos asociados al scope_id
        $productsObjSpecifics = Product::where('specific_objective_id', $productData['specific_objective_id'])->get();
        $product_number = $productsObjSpecifics->max('number') + 1;

        // Verifica si el número ya existe en los productos asociados a los objetivos específicos;
        if ($product->number) {
            if ($productsObjSpecifics->where('number', $product->number)->count() > 0) {
                // Si el número ya existe, puedes manejar aquí el error o la respuesta que desees
                throw new \Exception('Número ya existe en los productos asociados a los objetivos específicos', 422);
            }else{
                // Calcula el próximo número disponible para el nuevo producto
                $product->number = $productData['number'];
            }
        }else{
            // Calcula el próximo número disponible para el nuevo producto
            $product->number = $product_number;
        }

        // Obtener la carpeta con project_id igual a $project y nombre 'Expediente Contrato de Interventoría'
        $folder = Folder::where('project_id', $project)
                ->where('name', 'Ejecución de interventoría')
                ->first();

        if (is_null($folder)) 
        {
            throw new InterventoryFolderNotFoundException('La carpeta de interventoria no fue encontrada para el proyecto '.$project);
        }

        if ($folder->id) {
            $folderData = [
                "name" =>  $product_number . '. ' . $productData['name'],
                "stage_id" => 4,
                "project_id" => $project,
                "higher_folder_id" => $folder->id
            ];
            // Crear la carpeta y establecer la relación higherFolders si se proporciona higher_folder_id
            $result = $this->folderInterface->createNewFolder(collect($folderData));
            $product->folder_id = $result['id'];
        } else {
            throw new \Exception('No se pudo asignar una carpeta al producto', 422);
        }

        // Guarda el producto en la base de datos
        $product->save();

        return collect($product);
    }
    /**
     * Actualiza los datos de un producto existente.
     *
     * @param int $productId ID del producto que se va a actualizar.
     * @param Collection $productData Objeto ProductData que contiene los nuevos datos del producto.
     * @return collection Objeto ProductData que representa el producto actualizado.
     * @throws \Exception Se arroja si el producto no se encuentra o si el nuevo specificObjective no pertenece al mismo scope.
     */
    public function updateProduct($productId, Collection $productData)
    {
        // Encuentra el producto por su ID
        $product = Product::findOrFail($productId);

        // Guarda el nombre y el número actuales del producto
        $oldName = $product->name;
        $oldNumber = $product->number;

        $specificObjective = SpecificObjective::findOrFail($productData['specific_objective_id']);
        $scope_id = $specificObjective->scope_id;

        // Obtener todos los objetivos específicos de un scope_id
        $objSpecificObjects = SpecificObjective::where('scope_id', $scope_id)->get();

        // Obtener todos los productos de los objetivos específicos asociados al scope_id
        $productsObjSpecifics = Product::whereIn('specific_objective_id', $objSpecificObjects->pluck('id'))->get();

        if ($productsObjSpecifics->where('number', $productData['number'])->count() > 0 && $oldNumber != $productData['number']) {
            // Si el número ya existe, puedes manejar aquí el error o la respuesta que desees
            throw new \Exception('Número ya existe en los productos asociados a los objetivos específicos', 422);
        }

        $oldSpecificObjectiveId = $product->specific_objective_id;

        // Verifica si se está cambiando el specificObjective
        if ($productData['specific_objective_id'] && $oldSpecificObjectiveId !== $productData['specific_objective_id']) {
            // Verifica si el nuevo specificObjective pertenece al mismo scope
            $newSpecificObjective = SpecificObjective::findOrFail($productData['specific_objective_id']);
            $oldScopeId = SpecificObjective::findOrFail($oldSpecificObjectiveId)->scope_id;

            if ($newSpecificObjective->scope_id != $oldScopeId) {
                throw new \Exception('El nuevo specificObjective no pertenece al mismo scope', 422);
            }
        }

        // Actualiza los datos del producto
        $product->fill(collect($productData)->except([is_null($productData['number']) ? 'number' : '', 'folder_id'])->toArray());
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

        return collect($product);
    }


    /**
     * Elimina un producto existente.
     *
     * @param int $productId ID del producto que se va a eliminar.
     * @throws \Exception Se arroja si el producto no se encuentra.
     */
    public function deleteProduct(int $productId)
    {
         // Encuentra el producto por su ID
        $product = Product::findOrFail($productId);

        // Obtiene el folder asociado al producto
        Folder::findOrFail($product->folder_id);

        $this->folderInterface->deleteFolder($product->folder_id);

        // Elimina el producto
        $product->delete();

    }
  
/**
 * Obtiene el objetivo específico y sus productos asociados con indicadores por alcance.
 *
 * @param int $specificObjectiveId Identificador único del objetivo específico.
 * @return array ['specific_objective' => SpecificObjectiveData, 'products' => Collection|ProductDetailData[]]
 */
public function getAllProductsBySpecificObjective(int $specificObjectiveId)
{
    // Obtener el objetivo específico
    $specificObjective = SpecificObjective::findOrFail($specificObjectiveId);
    $specificObjectiveData = collect($specificObjective->toArray());

    // Obtener los productos asociados al objetivo específico con indicadores cargados
    $products = Product::with(['measurementUnit', 'indicators.measurementUnit'])
        ->where('specific_objective_id', $specificObjectiveId)
        ->get();

    $productsData = $products->toArray();
    $productsData = array_map(
        function($product)
        {
            unset($product["measurement_unit_id"]);
            $product["measurement_unit"] = $product["measurement_unit"]["name"]; 

            $product["indicators"] = array_map(
                function($indicator)
                {
                    unset($indicator["measurement_unit_id"]);
                    $indicator["measurement_unit"] = $indicator["measurement_unit"]["name"]; 
                    return $indicator;
                },
                $product["indicators"]
            );

            return $product;    
        },
        $productsData
    );

    // Devolver un array con el objetivo específico y los productos asociados
    return [
        'specific_objective' => $specificObjectiveData,
        'products' => $productsData,
    ];
}

    /**
     * Obtiene todos los productos existentes por alcance con un minimo de datos.
     *
     * @param int $scope_id Identificador único del alcance.
     * @return array array de objetos ProductData que representan los productos.
     */
    public function getAllProductsSummaryByScope(int $scopeId) : array
    {
        $products = Product::whereHas('specificObjective', function ($query) use ($scopeId) {
            $query->where('scope_id', $scopeId);
        })->get();

        return $products->toArray();
    }
}
