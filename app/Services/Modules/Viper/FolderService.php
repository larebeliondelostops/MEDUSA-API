<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Folder\FolderDTO;
use App\DTOs\Viper\Folder\FolderSelectDTO;
use App\Interfaces\Viper\FolderInterface;
use App\Interfaces\Viper\DocumentInterface;
use App\Models\Viper\Folder;
use App\Models\Viper\Project;
use App\Models\Viper\Stage;
use App\Utils\Viper\Filters\FolderFilter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

/**
 * Servicio para manejar operaciones relacionadas con las carpetas de documentos de los proyectos.
 *
 * Este servicio implementa la interfaz FolderInterface y es responsable
 * de realizar operaciones como la creación, actualización, recuperación
 * y eliminación de carpetas en los proyectos.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class FolderService implements FolderInterface
{

    private DocumentInterface $documentInterface;

    public function __construct(DocumentInterface $documentInterface)
    {
        $this->documentInterface = $documentInterface;
    }

    /**
     * Crea una nueva carpeta en el sistema Viper.
     *
     * @param FolderDTO $folderDTO Datos de la carpeta a crear.
     * @param int $higherFolderId Identificador de la carpeta padre (si tiene)
     * @return FolderDTO Resultado de la operación que puede incluir mensajes de éxito o error.
    */

    public function createNewFolder(FolderDTO $folderDTO)
    {

        // Crear la carpeta principal
        $folder = new Folder();
        $folder->fill($folderDTO->toArray());

        // Si se proporciona higherFolderId, establecer la relación
        if ($folderDTO->higher_folder_id) {
            $higherFolder = Folder::findOrFail($folderDTO->higher_folder_id);
            $folder->parentFolder()->associate($higherFolder);
            $folder->stage_id = $higherFolder->stage_id;
            $folder->project_id = $higherFolder->project_id;
        }else{
            if (empty($folderDTO->project_id) || empty($folderDTO->stage_id)) {
                throw new \Exception('No se ha definido proyecto ni etapa para la carpeta');
            }else {
                Project::findOrFail($folderDTO->project_id);
                Stage::findOrFail($folderDTO->stage_id);
            }
        }

        $folder->save();

        $folderDTO = new FolderDTO($folder->toArray());
        return $folderDTO;

    }

    /**
     * Actualiza el nombre de una carpeta específica en el sistema Viper.
     *
     * @param int $folderId Identificador único de la carpeta a actualizar.
     * @param string $newName Nuevo nombre para la carpeta.
     * @return FolderDTO Resultado de la operación que puede incluir mensajes de éxito o error.
     */
    public function updateFolderName(int $folderId, string $newName)
    {
        // Buscar la carpeta por su ID
        $folder = Folder::findOrFail($folderId);

        // Actualizar el nombre de la carpeta
        $folder->name = $newName;
        $folder->save();

        return new FolderDTO($folder->toArray());
    }


    /**
     * Obtiene la información detallada de una carpeta específica en el sistema Viper.
     *
     * @param int $folderId Identificador único de la carpeta.
     * @return array Resultado de la operación que incluye la información de la carpeta o mensajes de error.
     */
    public function getFolder(int $folderId)
    {
        // Buscar la carpeta por su ID
        $folder = Folder::findOrFail($folderId);

        // Crear una colección que contendrá la estructura jerárquica de carpetas
        $result = collect();

        // Crear un diccionario para realizar búsquedas rápidas de carpetas por ID
        $folderDictionary = collect([$folderId => $folder]);

        $result->push($this->buildFolderHierarchy($folder, $folderDictionary));

        return $result->all();
    }

    /**
     * Obtiene todas las carpetas asociadas a un proyecto y su jerarquía.
     *
     * @param int $projectId Identificador (bpin) del proyecto
     * @return array
     */
    public function getAllFolders($projectId, array $queryParams = [])
    {

        // Obtener el usuario autenticado y su rol
        //$user = Auth::user();
        //$role = $user->role; 

        // Crea una instancia del filtro y transforma los parámetros
        $filter = new FolderFilter();
        $queryItems = $filter->transform($queryParams);

        // Aplica los filtros a la consulta Eloquent
        $folderQuery = Folder::query();
        foreach($queryItems as $item) {
            if(count($item) === 3) {
                $folderQuery->orWhere($item[0], $item[1], ($item[1]=="ilike"?"%".$item[2]."%":$item[2]));
            }
        }
        
        // Si el usuario no es administrador, se filtra por su ID de usuario
        //if ($role !== 'admin') {
        //    $folderQuery->where('user_id', $user->id);
        //}

        // Obtén todas las carpetas para el proyecto específico con el filtro aplicado
        $folders = $folderQuery->where('project_id', $projectId)->get();

         // Crear una colección que contendrá la estructura jerárquica de carpetas
         $result = collect();

         // Crear un diccionario para realizar búsquedas rápidas de carpetas por ID
         $folderDictionary = $folders->keyBy('id');

        // Iterar sobre cada carpeta
        foreach ($folders as $folder) {
            // Si la carpeta no tiene una carpeta superior, es decir, es la carpeta raíz o si tiene algun filtro
            if (!$folder->higher_folder_id || $queryItems) {
                // Agregar la carpeta raíz y sus subcarpetas a la colección
                $result->push($this->buildFolderHierarchy($folder, $folderDictionary));
            }
        }
        return $result->all();
    }

    /**
     * Función privada recursiva para construir la jerarquía de carpetas.
     *
     * @param Folder $folder
     * @param Collection $folderDictionary
     * @return array
     */
    private function buildFolderHierarchy(Folder $folder, Collection $folderDictionary): array
    {
        // Obtener las subcarpetas
        $subfolders = $folder->subfolders->map(
            fn($subfolder) => $this->buildFolderHierarchy($subfolder, $folderDictionary)
        );

        // Obtener los documentos asociados a la carpeta
        $documents = $this->documentInterface->getDocumentsByFolder($folder->id);

        return [
            'folder' => new FolderDTO($folder->toArray()),
            'subfolders' => $subfolders->all(),
            'documents' => $documents,
        ];
    }

    /**
     * Elimina una carpeta específica y todas sus subcarpetas en el sistema Viper.
     *
     * @param int $folderId Identificador único de la carpeta a eliminar.
     */
    public function deleteFolder(int $folderId)
    {
        // Buscar la carpeta por su ID
        $folder = Folder::findOrFail($folderId);

        // Eliminar todas las subcarpetas y documentos asociados
        $this->recursiveDelete($folder);
    }

    /**
     * Función privada recursiva para eliminar carpetas y documentos de forma recursiva.
     *
     * @param Folder $folder
     */
    private function recursiveDelete(Folder $folder)
    {
        // Obtener todas las subcarpetas de la carpeta actual
        $subfolders = $folder->subfolders;

        // Eliminar documentos asociados a la carpeta actual
        $this->documentInterface->deleteDocumentsByFolder($folder->id);

        // Recorrer las subcarpetas y eliminarlas recursivamente
        foreach ($subfolders as $subfolder) {
            $this->recursiveDelete($subfolder);
        }

        // Eliminar la carpeta actual (lógicamente)
        $folder->delete();
    }


    /**
     * Crea una jerarquía de carpetas en el sistema Viper, incluyendo subcarpetas según la estructura proporcionada.
     *
     * @param array $folderData Datos de la carpeta principal y sus subcarpetas.
     * @param int $projectId Identificador del proyecto al que pertenecen las carpetas.
     * @param array|null $parentFolder Datos de la carpeta superior (opcional) para establecer relaciones jerárquicas.
     * @return void
     */
    public function createFolderHierarchy($folderData, $projectId, $parentFolder = null)
    {
        $validatedData = [
            'name' => $folderData['name'],
            'stage_id' => $folderData['stage_id'] ?? $parentFolder['stage_id'],
            'project_id' => $projectId,
            'higher_folder_id' => $parentFolder['id'] ?? null,
        ];

        $folderDTO = new FolderDTO($validatedData);

        // Usar el servicio para crear la carpeta y establecer la relación higherFolders
        $folderResponse = $this->createNewFolder($folderDTO)->toArray();

        // Ajustar el acceso a la respuesta según la estructura real
        $folder = isset($folderResponse['data']) ? $folderResponse['data'] : $folderResponse;

        if (isset($folderData['subfolders']) && is_array($folderData['subfolders'])) {
            foreach ($folderData['subfolders'] as $subfolderData) {
                $this->createFolderHierarchy($subfolderData, $projectId, $folder);
            }
        }
    }


    /**
     * Obtiene todas las carpetas asociadas a un proyecto y su jerarquía solo nombre y id.
     *
     * @param int $projectId Identificador (bpin) del proyecto
     * @return array
     */
    public function getAllFoldersSelect($projectId)
    {
        // Obtén todas las carpetas para el proyecto específico con el filtro aplicado
        $folders = Folder::where('project_id', $projectId)->get();

         // Crear una colección que contendrá la estructura jerárquica de carpetas
         $result = collect();

         // Crear un diccionario para realizar búsquedas rápidas de carpetas por ID
         $folderDictionary = $folders->keyBy('id');

        // Iterar sobre cada carpeta
        foreach ($folders as $folder) {
            // Si la carpeta no tiene una carpeta superior, es decir, es la carpeta raíz o si tiene algun filtro
            if (!$folder->higher_folder_id) {
                // Agregar la carpeta raíz y sus subcarpetas a la colección
                $result->push($this->buildFolderHierarchySelect($folder, $folderDictionary));
            }
        }
        return $result->all();
    }

    /**
     * Función privada recursiva para construir la jerarquía de carpetas para el select.
     *
     * @param Folder $folder
     * @param Collection $folderDictionary
     * @return array
     */
    private function buildFolderHierarchySelect(Folder $folder, Collection $folderDictionary): array
    {
        // Obtener las subcarpetas
        $subfolders = $folder->subfolders->map(
            fn($subfolder) => $this->buildFolderHierarchySelect($subfolder, $folderDictionary)
        );
    
        return [
            'folder' => new FolderSelectDTO($folder->toArray()),
            'subfolders' => $subfolders->all(),
        ];
    }


    /**
     * Crea una jerarquía de carpetas en el sistema Viper para un contrato.
     *
     * @param string $contractName Nombre del tipo de contrato.
     * @param int $projectId Identificador del proyecto al que pertenecen las carpetas.
     */
    public function createFolderContract(string $contractName, int $projectId)
    {
        $foldersName = ['Ajustes de', 'Precontractual de', 'Contractual de', 'Ejecución de', 'Cierre de'];

        $parentFolder = Folder::where('project_id', $projectId)
        ->where('name', 'Contratos del proyecto')
        ->first();

        $folderParentData = [
            'name' => $contractName,
            'higher_folder_id' => $parentFolder->id,
        ];

        $folderDTO = new FolderDTO($folderParentData);
        $contractFolderParent = $this->createNewFolder($folderDTO);


        foreach ($foldersName as $folderName){
            $validatedData = [
                'name' => $folderName . ' ' . strtolower($contractName),
                'higher_folder_id' => $contractFolderParent->id,
            ];
    
            $folderDTO = new FolderDTO($validatedData);
            $this->createNewFolder($folderDTO);
        }
    }

    /**
     * Elimina todas las carpetas y subcarpetas asociadas a un proyecto en el sistema Viper.
     *
     * @param int $projectId Identificador único del proyecto.
     */
    public function deleteAllFoldersByProjectId($projectId)
    {
        // Obtener todas las carpetas asociadas al proyecto
        $folders = Folder::where('project_id', $projectId)->get();

        // Iterar sobre cada carpeta y eliminarlas recursivamente
        foreach ($folders as $folder) {
            $this->recursiveDelete($folder);
        }
    }

}
