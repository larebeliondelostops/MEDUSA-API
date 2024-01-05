<?php

namespace App\Services\Viper;

use App\DTOs\Viper\FolderDTO;
use App\Interfaces\Viper\FolderInterface;
use App\Interfaces\Viper\DocumentInterface;
use App\Models\Viper\Folder;
use App\Models\Viper\FolderRelationship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class FolderService implements FolderInterface
{

    private DocumentInterface $documentInterface;

    public function __construct(DocumentInterface $documentInterface)
    {
        $this->documentInterface = $documentInterface;
    }

    public function createNewFolder(FolderDTO $folderDTO, ?int $higherFolderId = null)
    {
        // Crear la carpeta principal
        $folder = new Folder();
        $folder->fill($folderDTO->toArray());
        $folder->save();
    
        // Si se proporciona higherFolderId, establecer la relación
        if ($higherFolderId) {
            $higherFolder = Folder::find($higherFolderId);
    
            if ($higherFolder) {
                // Asegúrate de que la relación lowerFolders está cargada
                $higherFolder->load('lowerFolders');
    
                // Crear la relación entre carpetas
                $relationship = new FolderRelationship();
                $relationship->higher_folder = $higherFolder->id;
                $relationship->lower_folder = $folder->id;
                $relationship->save();
            } else {
                // Manejar el caso donde no se encuentra la carpeta superior
                return ['error' => 'Carpeta superior no encontrada'];
            }
        }
    
        return ['message' => 'Carpeta creada exitosamente', 'data' => $folder->toArray()];
    }

    public function updateFolderName(int $folderId, string $newName)
    {
        // Buscar la carpeta por su ID
        $folder = Folder::find($folderId);

        if ($folder) {
            // Actualizar el nombre de la carpeta
            $folder->name = $newName;
            $folder->save();

            return ['message' => 'Nombre de carpeta actualizado correctamente', 'data' => $folder->toArray()];
        }

        return ['error' => 'Carpeta no encontrada'];
    }

    
    public function getFolder(int $folderId)
    {
        // Buscar la carpeta por su ID
        $folder = Folder::find($folderId);

        if ($folder) {
            // Crear una colección que contendrá la estructura jerárquica de carpetas
            $result = collect();

            // Crear un diccionario para realizar búsquedas rápidas de carpetas por ID
            $folderDictionary = collect([$folderId => $folder]);

            $result->push($this->buildFolderHierarchy($folder, $folderDictionary));

            return [
                'data' => $result->all(),
            ];
        }

        return ['error' => 'Carpeta no encontrada'];
    }


    public function getAllFolders($projectId)
    {
        $perPage = 20;
        // Obtener todas las carpetas para el proyecto específico
        $folders = Folder::where('project_id', $projectId)->paginate($perPage);
        // Crear una colección que contendrá la estructura jerárquica de carpetas
        $result = collect();
    
        // Crear un diccionario para realizar búsquedas rápidas de carpetas por ID
        $folderDictionary = $folders->keyBy('id');
    
        // Iterar sobre cada carpeta
        foreach ($folders as $folder) {
            // Si la carpeta no tiene una carpeta superior, es decir, es la carpeta raíz
            if (!$folder->higherFolders->count()) {
                // Agregar la carpeta raíz y sus subcarpetas a la colección
                $result->push($this->buildFolderHierarchy($folder, $folderDictionary));
            }
        }
    
        return [
            'data' => $result->all(),
            'pagination' => [
                'current_page' => $folders->currentPage(),
                'per_page' => $folders->perPage(),
                'total' => $folders->total(),
                'prev_page_url' => $folders->previousPageUrl(),
                'next_page_url' => $folders->nextPageUrl(),
            ],
        ];
    }
    

    // Función recursiva para construir la jerarquía de carpetas
    private function buildFolderHierarchy(Folder $folder, Collection $folderDictionary): array
    {
        // Crear un nuevo FolderDTO
        $folderDTO = new FolderDTO(
            $folder->name,
            $folder->stage_id,
            $folder->project_id
        );

        // Obtener las subcarpetas
        $subfolders = $folder->lowerFolders->map(
            fn($subfolder) => $this->buildFolderHierarchy($subfolder, $folderDictionary)
        );

        // Obtener los documentos asociados a la carpeta
        $documents = $this->documentInterface->getDocumentsByFolder($folder->id);

        return [
            'folder' => array_merge($folderDTO->toArray(), ['id' => $folder->id]),
            'subfolders' => $subfolders->all(),
            'documents' => $documents,
        ];
    }


    public function deleteFolder(int $folderId)
    {
        // Buscar la carpeta por su ID
        $folder = Folder::find($folderId);

        if ($folder) {
            // Eliminar todas las subcarpetas y documentos asociados
            $this->recursiveDelete($folder);

            return ['message' => 'Carpeta y subcarpetas eliminadas correctamente'];
        }

        return ['error' => 'Carpeta no encontrada'];
    }

    private function recursiveDelete(Folder $folder)
    {
        // Obtener todas las subcarpetas de la carpeta actual
        $subfolders = $folder->lowerFolders;

        // Eliminar documentos asociados a la carpeta actual
        $this->documentInterface->deleteDocumentsByFolder($folder->id);

        // Recorrer las subcarpetas y eliminarlas recursivamente
        foreach ($subfolders as $subfolder) {
            $this->recursiveDelete($subfolder);
        }

        // Eliminar la carpeta actual
        $folder->delete();
    }
}
