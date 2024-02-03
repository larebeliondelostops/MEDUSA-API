<?php

namespace App\Services\Viper;

use App\DTOs\Viper\Document\DocumentDTO;
use App\DTOs\Viper\Folder\FolderDTO;
use App\Interfaces\Viper\DocumentInterface;
use App\Models\Viper\Document;
use App\Models\Viper\Folder;
use App\Utils\Viper\Filters\DocumentFilter;
use App\Models\Viper\Project; 
use Storage;

/**
 * Servicio para manejar operaciones relacionadas los documentos de los proyectos.
 *
 * Este servicio implementa la interfaz DocumentInterface y es responsable
 * de realizar operaciones como la creación, actualización, recuperación
 * y eliminación de documentos en los proyectos y el spaces de DigitalOcean.
 * @package    App\Service\Viper
 * @author     Daniel Alférez <dan.alferez1@gmail.com>
 * @copyright  2024 Ignicion S.A.S.
 * @version    v1.0.0
 */
class DocumentService implements DocumentInterface
{
    /**
     * Crea un nuevo documento en el sistema Viper.
     *
     * @param DocumentDTO $documentDTO Datos del documento a crear.
     * @param \Illuminate\Http\UploadedFile $file Archivo a cargar.
     * @param int $project_id Identificador del proyecto al que pertenece el documento.
     * @return array Contiene los datos del documento creado en caso de éxito.
     */
    public function createNewDocument(DocumentDTO $documentDTO, \Illuminate\Http\UploadedFile $file, string $project_id)
    {
        // Verificar si el proyecto existe
        Project::findOrFail($project_id);
        Folder::findOrFail($documentDTO->folder_id);

        // Crear una nueva instancia de Document
        $document = new Document();

        // Obtener el nombre original del archivo
        $originalFilename = $file->getClientOriginalName();

        // Construir la ruta de la carpeta basada en la jerarquía de carpetas
        $folderPath = "test/{$project_id}/{$documentDTO->folder_id}";

        // Generar un nombre único para el archivo
        $filename = $this->getUniqueFilename($folderPath, $originalFilename);

        // Almacenar el archivo en Spaces con la carpeta y nombre construido
        $filePath = Storage::disk('spaces')->putFileAs($folderPath, $file, $filename);

        // Obtener la URL del documento
        $url = Storage::disk('spaces')->url($filePath);

        // Configurar los atributos del documento
        $document->name = $filename;
        $document->url = $url;
        $document->responsible = $documentDTO->responsible;
        $document->folder_id = $documentDTO->folder_id;

        // Guardar el documento en la base de datos
        $document->save();

        return $document->toArray();
    }

    /**
     * Obtiene un nombre de archivo único en una carpeta
     *
     * @param string $folderPath Ruta de la carpeta en "Spaces".
     * @param string $originalFilename Nombre inicial del documento.
     * @return string Nombre final del documento.
     */
    private function getUniqueFilename($folderPath, $originalFilename)
    {
        $filename = $originalFilename;
        $counter = 1;

        // Verificar si el archivo ya existe en la carpeta
        while (Storage::disk('spaces')->exists("{$folderPath}/{$filename}")) {
            // Generar un nuevo nombre con un número entre paréntesis
            $filename = pathinfo($originalFilename, PATHINFO_FILENAME) . "({$counter})" . '.' . pathinfo($originalFilename, PATHINFO_EXTENSION);
            $counter++;
        }

        return $filename;
    }


    /**
     * Elimina lógicamente un documento del sistema Viper y lo mueve a la carpeta de documentos eliminados en DigitalOcean Spaces.
     *
     * @param int $documentId Identificador del documento a eliminar.
     * @return array Contiene un mensaje indicando si el documento fue eliminado correctamente.
     */
    public function deleteDocument(int $documentId)
    {
        // Obtener el documento por su ID
        $document = Document::findOrFail($documentId);

        $folder = Folder::findOrFail($document->folder_id);

        Project::findOrFail($folder->project_id);

        // Construir la ruta de la carpeta de documentos eliminados
        $deletedFolderPath = "test/{$folder->project_id}/deleted";

        $originalFilePath = parse_url($document->url, PHP_URL_PATH);
    
        // Mover el archivo a la carpeta de documentos eliminados
        Storage::disk('spaces')->move($originalFilePath, $deletedFolderPath . '/' . $document->name);
    
        // Actualizar la URL del documento
        $document->url = Storage::disk('spaces')->url($deletedFolderPath . '/' . $document->name);

        // Guardar el documento actualizado en la base de datos
        $document->save();
    
        // Eliminar el documento lógicamente de la base de datos
        $document->delete();
    
        return ['message' => 'Documento movido a la carpeta de documentos eliminados en DigitalOcean Spaces y eliminado lógicamente correctamente'];
    }
    

    /**
     * Elimina fisicamente un documento del sistema Viper.
     *
     * @param int $documentId Identificador del documento a eliminar.
     * @return array Contiene un mensaje indicando si el documento fue eliminado correctamente.
     */
    public function deleteForceDocument(int $documentId)
    {
        // Obtener el documento por su ID
        $document = Document::withTrashed()->findOrFail($documentId);

        // Obtener la ruta del archivo
        $filePath = parse_url($document->url, PHP_URL_PATH);

        // Verificar si el archivo existe en el sistema de archivos "spaces"
        if (Storage::disk('spaces')->exists($filePath)) {
            // Eliminar el archivo
            Storage::disk('spaces')->delete($filePath);
        }

        // Eliminar el documento fisicamente de la base de datos
        $document->forceDelete();

        return ['message' => 'Documento definitivamente eliminado de forma correcta'];
    }

    /**
     * Actualiza el nombre de un documento en el sistema Viper.
     *
     * @param int $documentId Identificador del documento a actualizar.
     * @param string $newName Nuevo nombre del documento.
     * @return array Contiene un mensaje indicando si el nombre del documento fue actualizado correctamente.
     */
    public function updateDocument(int $documentId, string $newName)
    {
        // Obtener el documento por su ID
        $document = Document::findOrFail($documentId);
    
        // Obtener la ruta del archivo original
        $originalFilePath = parse_url($document->url, PHP_URL_PATH);

        // Verificar si el archivo existe en el sistema de archivos "spaces"
        if (Storage::disk('spaces')->exists($originalFilePath)) {
            // Obtener la extensión del archivo
            $extension = pathinfo($originalFilePath, PATHINFO_EXTENSION);

            // Construir el nuevo nombre con la extensión
            $newFileName = $this->getUniqueFilename(dirname($originalFilePath), $newName) . '.' . $extension;

            // Construir la nueva ruta del archivo
            $newFilePath = dirname($originalFilePath) . '/' . $newFileName;

            // Copiar el archivo con el nuevo nombre
            if (Storage::disk('spaces')->copy($originalFilePath, $newFilePath)) {
                // Eliminar el archivo original
                Storage::disk('spaces')->delete($originalFilePath);

                // Actualizar la URL y el nombre en la base de datos
                $document->name = $newFileName;
                $document->url = Storage::disk('spaces')->url($newFilePath);
                $document->save();

                return ['message' => 'Nombre del documento actualizado correctamente'];
            }
            throw new \Exception('Error al copiar el archivo con el nuevo nombre');
        }
        throw new \Exception('Documento no encontrado en el sistema de archivos');
    }
        
    /**
     * Obtiene todos los documentos del sistema Viper.
     *
     * @return array Contiene los datos de todos los documentos en el sistema.
     */
    public function getAllDocuments(array $queryParams = [], int $projectId)
    {
        $filter = new DocumentFilter();
        $queryItems = $filter->transform($queryParams);
    
        // Aplica los filtros a la consulta Eloquent solo si hay parámetros de consulta
        if (!empty($queryItems)) {
            $documentQuery = Document::query();

            if (isset($queryParams['name'])){
                $documentQuery->where($queryItems[0][0], $queryItems[0][1],  '%' . $queryItems[0][2] . '%');
            }
            
    
            // Obtén todos los documentos con el filtro aplicado
            $documents = $documentQuery->whereHas('folder', function ($query) use ($projectId) {
                    $query->where('project_id', $projectId);
                })
                ->get();
    
            // Crear una colección para almacenar la información de los documentos y sus carpetas
            $result = collect();
    
            foreach ($documents as $document) {
                // Obtener la carpeta principal del documento
                $folder = $document->folder;
                $accepted = true;
                // Inicializar el array de IDs con el ID de la carpeta actual
                $pathIds = [$folder->id];
    
                if(isset($queryParams['folder_id'])) {
                    if ((int)$queryParams['folder_id']['eq'] != $folder->id) {
                        do  {
                            // Obtener la carpeta superior
                            try {
                                $folder = Folder::findOrFail($folder->higher_folder_id);
                            } catch (\Exception $e) {
                                break;
                            }   
        
                            // Agregar el ID de la carpeta superior al array
                            array_unshift($pathIds, $folder->id);
    
                        } while((int)$queryParams['folder_id']['eq'] !== $folder->id);
    
                        if ((int)$queryParams['folder_id']['eq'] !== $pathIds[0]) {
                            $accepted = false;
                        }    
                    }
                }else{
                    // Iterar hacia arriba en la jerarquía hasta llegar a la carpeta raíz
                    while ($folder->higher_folder_id) {
                        // Obtener la carpeta superior
                        $folder = Folder::findOrFail($folder->higher_folder_id);
    
                        // Agregar el ID de la carpeta superior al array
                        array_unshift($pathIds, $folder->id);
                    }
                }

                if ($accepted) {
                    $result->push($this->getHierarchy(Folder::findOrFail($pathIds[0]), $pathIds, $document));
                }
            }
    
            return $result->all();
        } else {
            // Si no hay parámetros de consulta, obtener todos los documentos
            $documents = Document::all();
            return $documents->toArray();
        }
    }
    
    private function getHierarchy(Folder $folder, array $pathIds, Document $document)
    {
        // Obtener las subcarpetas cuyo ID está en el array $pathIds
        $subfolders = $folder->subfolders
            ->filter(fn($subfolder) => in_array($subfolder->id, $pathIds))
            ->map(fn($subfolder) => $this->getHierarchy($subfolder, $pathIds, $document));
        

        if ($folder->id == $document->folder_id) {
            return [
                'folder' => new FolderDTO($folder->toArray()),
                'subfolders' => $subfolders->all(),
                'documents' => [new DocumentDTO($document->toArray())],
            ];
        } else {
            return [
                'folder' => new FolderDTO($folder->toArray()),
                'subfolders' => $subfolders->all(),
                'documents' => [],
            ];
        }
    }
    

    /**
     * Obtiene documentos por carpeta en el sistema Viper.
     *
     * @param int $folderId Identificador de la carpeta.
     * @return array Contiene los datos de documentos en la carpeta especificada.
     */
    public function getDocumentsByFolder($folderId)
    {
        // Implementa la lógica para obtener documentos por carpeta
        $documents = Document::where('folder_id', $folderId)->get();

        $documentDTOs = [];
        foreach ($documents as $document) {
            $documentDTOs[] = new DocumentDTO($document->toArray());
        }

        return $documents;
    }

    /**
     * Elimina logicamente todos los documentos asociados a una carpeta en el sistema Viper.
     *
     * @param int $folderId Identificador de la carpeta.
     * @return void
     */
    public function deleteDocumentsByFolder(int $folderId)
    {
        // Eliminar todos los documentos asociados a la carpeta
        $documents = Document::where('folder_id', $folderId)->get();

        foreach ($documents as $document) {
            $this->deleteDocument($document->id);
        }
    }

    /**
     * Elimina fisicamente todos los documentos asociados a una carpeta en el sistema Viper.
     *
     * @param int $folderId Identificador de la carpeta.
     * @return void
     */
    public function deleteForceDocumentsByFolder(int $folderId)
    {
        // Eliminar todos los documentos asociados a la carpeta
        $documents = Document::where('folder_id', $folderId)->get();

        foreach ($documents as $document) {
            $this->deleteForceDocument($document->id);
        }
    }

    /**
     * Lista las URLs de los documentos almacenados en el sistema de archivos "Spaces".
     *
     * @param string $folderPath Ruta de la carpeta en "Spaces".
     * @return array Contiene las URLs de los documentos en la carpeta especificada.
     */
    public function listDocumentsInSpaces($folderPath = 'test')
    {
        // Verificar si la carpeta existe en el sistema de archivos "spaces"
        if (Storage::disk('spaces')->exists($folderPath)) {
            // La carpeta existe, ahora puedes obtener la lista de archivos
            $files = $this->listFilesRecursive($folderPath);
        
            // Obtener las URLs de los archivos
            $fileUrls = array_map(function ($file) use ($folderPath) {
                return Storage::disk('spaces')->url($file);
            }, $files);
        
            return $fileUrls;
        }
        
        // La carpeta no existe
        throw new \Exception('Carpeta de spaces no encontrada');
    }

    /**
     * Función interna para obtener la lista de archivos de manera recursiva en una carpeta.
     *
     * @param string $folderPath Ruta de la carpeta en "Spaces".
     * @return array Contiene la lista de archivos en la carpeta y sus subcarpetas.
     */
    private function listFilesRecursive($folderPath)
    {
        $files = [];

        // Obtener la lista de archivos en la carpeta
        $currentFiles = Storage::disk('spaces')->files($folderPath);
        $files = array_merge($files, $currentFiles);

        // Obtener la lista de subcarpetas
        $subfolders = Storage::disk('spaces')->directories($folderPath);

        // Recorrer las subcarpetas y obtener sus archivos de manera recursiva
        foreach ($subfolders as $subfolder) {
            $files = array_merge($files, $this->listFilesRecursive($subfolder));
        }

        return $files;
    }

    /**
     * Obtiene los documentos por carpeta eliminados lógicamente del sistema Viper.
     *
     * @return array Contiene los datos de los documentos eliminados.
     */
    public function getDeletedDocumentsByFolder(int $folderId)
    {
        // Obtén todos los documentos eliminados lógicamente por carpeta
        $deletedDocuments = Document::onlyTrashed()
            ->where('folder_id', $folderId)
            ->get();
    
        // Cargar la información de la carpeta asociada a los documentos, incluyendo las carpetas eliminadas lógicamente
        $deletedDocuments->load(['folder' => function ($query) {
            $query->withTrashed();
        }]);
                
        $documentDTOs = [];
        foreach ($deletedDocuments as $document) {
            $documentDTO = new DocumentDTO($document->toArray());
            $documentDTO->folder = new FolderDTO($document->folder->toArray());
            $documentDTOs[] = $documentDTO;
        }
    
        return $documentDTOs;
    }
    
    


    /**
     * Obtiene los documentos eliminados por proyecto lógicamente por proyecto del sistema Viper.
     *
     * @param int $projectId Identificador del proyecto.
     * @return array Contiene los datos de los documentos eliminados.
     */
    public function getDeletedDocumentsByProject(int $projectId)
    {
        $deletedDocuments = Document::onlyTrashed()
        ->whereHas('folder', function ($query) use ($projectId) {
            $query->where('project_id', $projectId)->withTrashed();
        })
        ->get();

        $deletedDocuments->load(['folder' => function ($query) {
            $query->withTrashed();
        }]);

        // Transforma los resultados utilizando el DTO
        $documentDTOs = [];
        foreach ($deletedDocuments as $document) {
            $documentDTO = new DocumentDTO($document->toArray());
            $documentDTO->folder = new FolderDTO($document->folder->toArray());
            $documentDTOs[] = $documentDTO;
        }

        return $documentDTOs;
    }


    /**
     * Elimina lógicamente varios documentos del sistema Viper.
     *
     * @param array $documentIds Array de IDs de documentos a eliminar.
     * @return array Contiene un mensaje indicando si los documentos fueron eliminados correctamente.
     */
    public function deleteMultipleDocuments(array $documentIds)
    {

        foreach ($documentIds as $documentId) {
            // Eliminar cada documento logicamente de la base de datos
            $this->deleteDocument($documentId);
        }

        return ['message' => 'Documentos eliminados correctamente'];
    }

    /**
     * Elimina definitivamente varios documentos del sistema Viper.
     *
     * @param array $documentIds Array de IDs de documentos a eliminar definitivamente.
     * @return array Contiene un mensaje indicando si los documentos fueron eliminados definitivamente correctamente.
     */
    public function deleteForceMultipleDocuments(array $documentIds)
    {
        foreach ($documentIds as $documentId) {
            // Eliminar cada documento logicamente de la base de datos
            $this->deleteForceDocument($documentId);
        }

        return ['message' => 'Documentos eliminados definitivamente correctamente'];
    }

    /**
     * Recupera lógicamente un documento eliminado por carpeta en el sistema Viper.
     *
     * @param int $documentId Identificador del documento a recuperar.
     * @param int $newFolderId Identificador de la nueva carpeta donde se guardará el documento.
     * @return array Contiene los datos del documento recuperado.
     */
    public function restoreDocument(int $documentId, int $folderId)
    {
        // Obtén el documento eliminado lógicamente por su ID
        $deletedDocument = Document::onlyTrashed()
            ->where('id', $documentId)
            ->firstOrFail();

        // Obtén la carpeta nueva por su ID
        $newFolder = Folder::findOrFail($folderId);

        // Restaurar el documento lógicamente y asignar la nueva carpeta
        $deletedDocument->restore();
        $deletedDocument->folder_id = $newFolder->id;

        // Construir la ruta de la nueva carpeta basada en la jerarquía de carpetas
        $folderPath = "test/{$newFolder->project_id}/{$newFolder->id}";


        $originalFilePath = parse_url($deletedDocument->url, PHP_URL_PATH);

        // Mover el archivo a la carpeta de documentos eliminados
        Storage::disk('spaces')->move($originalFilePath, $folderPath . '/' . $deletedDocument->name);

        // Actualizar la URL del documento
        $deletedDocument->url = Storage::disk('spaces')->url($folderPath . '/' . $deletedDocument->name);

        $deletedDocument->save();

        // Crear un DTO para el documento restaurado
        $restoredDocumentDTO = new DocumentDTO($deletedDocument->toArray());

        return $restoredDocumentDTO;
    }


    
}
