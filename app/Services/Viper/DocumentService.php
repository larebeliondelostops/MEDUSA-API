<?php

namespace App\Services\Viper;

use App\DTOs\Viper\DocumentDTO;
use App\Interfaces\Viper\DocumentInterface;
use App\Models\Viper\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
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
     * @return \Illuminate\Http\JsonResponse Contiene los datos del documento creado en caso de éxito.
     */
    public function createNewDocument(DocumentDTO $documentDTO, \Illuminate\Http\UploadedFile $file, string $project_id)
    {
        // Verificar si el proyecto existe
        $projectExists = Project::where('bpin', $project_id)->exists();

        if (!$projectExists) {
            throw new \Exception('El proyecto no existe.', 404);
        }

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
     * Elimina un documento del sistema Viper.
     *
     * @param int $documentId Identificador del documento a eliminar.
     * @return array Contiene un mensaje indicando si el documento fue eliminado correctamente.
     */
    public function deleteDocument(int $documentId)
    {
        // Obtener el documento por su ID
        $document = Document::findOrFail($documentId);

        // Obtener la ruta del archivo
        $filePath = parse_url($document->url, PHP_URL_PATH);

        // Verificar si el archivo existe en el sistema de archivos "spaces"
        if (Storage::disk('spaces')->exists($filePath)) {
            // Eliminar el archivo
            Storage::disk('spaces')->delete($filePath);
        }

        // Eliminar el documento de la base de datos
        $document->delete();

        return ['message' => 'Documento eliminado correctamente'];
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
    public function getAllDocuments()
    {
        // Obtener todos los documentos de la base de datos
        $documents = Document::all();
        return $documents->toArray();
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

        return $documents->toArray();
    }

    /**
     * Elimina todos los documentos asociados a una carpeta en el sistema Viper.
     *
     * @param int $folderId Identificador de la carpeta.
     * @return void
     */
    public function deleteDocumentsByFolder(int $folderId)
    {
        // Eliminar todos los documentos asociados a la carpeta
        $documents = Document::where('folder_id', $folderId)->get();

        foreach ($documents as $document) {
            // Obtener la ruta del archivo
            $filePath = parse_url($document->url, PHP_URL_PATH);
    
            // Verificar si el archivo existe en el sistema de archivos "spaces"
            if (Storage::disk('spaces')->exists($filePath)) {
                // Eliminar el archivo
                Storage::disk('spaces')->delete($filePath);
            }
    
            // Eliminar el documento de la base de datos
            $document->delete();
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
}
