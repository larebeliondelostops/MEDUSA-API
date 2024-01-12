<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Folder\FolderDTO;
use App\Interfaces\Viper\FolderInterface;
use App\Interfaces\Viper\DocumentInterface;
use App\Models\Viper\Folder;
use App\Models\Viper\FolderRelationship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

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
     * @return array Resultado de la operación que puede incluir mensajes de éxito o error.
     */
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
                throw new \Exception('Carpeta superior no encontrada', 404);
            }
        }
        return $folder->toArray();
    }

    /**
     * Actualiza el nombre de una carpeta específica en el sistema Viper.
     *
     * @param int $folderId Identificador único de la carpeta a actualizar.
     * @param string $newName Nuevo nombre para la carpeta.
     * @return array Resultado de la operación que puede incluir mensajes de éxito o error.
     */
    public function updateFolderName(int $folderId, string $newName)
    {
        // Buscar la carpeta por su ID
        $folder = Folder::find($folderId);

        if ($folder) {
            // Actualizar el nombre de la carpeta
            $folder->name = $newName;
            $folder->save();

            return new FolderDTO($folder->toArray());
        } else {
            throw new \Exception('Carpeta no encontrada', 404);
        }
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
        $folder = Folder::find($folderId);

        if ($folder) {
            // Crear una colección que contendrá la estructura jerárquica de carpetas
            $result = collect();

            // Crear un diccionario para realizar búsquedas rápidas de carpetas por ID
            $folderDictionary = collect([$folderId => $folder]);

            $result->push($this->buildFolderHierarchy($folder, $folderDictionary));

            return $result->all();
        } else {
            throw new \Exception('Carpeta no encontrada', 404);
        }

        
    }

    /**
     * Obtiene todas las carpetas asociadas a un proyecto y su jerarquía.
     *
     * @param int $projectId Identificador (bpin) del proyecto
     * @return array
     */
    public function getAllFolders($projectId)
    {
        // Obtener todas las carpetas para el proyecto específico
        $folders = Folder::where('project_id', $projectId)->get();
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
        $subfolders = $folder->lowerFolders->map(
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
     * @return array Resultado de la operación que puede incluir mensajes de éxito o error.
     */
    public function deleteFolder(int $folderId)
    {
        // Buscar la carpeta por su ID
        $folder = Folder::find($folderId);

        if ($folder) {
            // Eliminar todas las subcarpetas y documentos asociados
            $this->recursiveDelete($folder);
            return ['message' => 'Carpeta y subcarpetas eliminadas correctamente'];
        }
        throw new \Exception('Carpeta no encontrada', 404);
    }

    /**
     * Función privada recursiva para eliminar carpetas y documentos de forma recursiva.
     *
     * @param Folder $folder
     */
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
    
        $folderDTO = new FolderDTO(
            $validatedData['name'],
            $validatedData['stage_id'],
            $validatedData['project_id']
        );
    
        // Usar el servicio para crear la carpeta y establecer la relación higherFolders
        $folderResponse = $this->createNewFolder($folderDTO, $validatedData['higher_folder_id']);
        
        // Ajustar el acceso a la respuesta según la estructura real
        $folder = isset($folderResponse['data']) ? $folderResponse['data'] : $folderResponse;
    
        if (isset($folderData['subfolders']) && is_array($folderData['subfolders'])) {
            foreach ($folderData['subfolders'] as $subfolderData) {
                $this->createFolderHierarchy($subfolderData, $projectId, $folder);
            }
        }
    }
}
