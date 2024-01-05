<?php

namespace App\Services\Viper;

use App\DTOs\Viper\DocumentDTO;
use App\Interfaces\Viper\DocumentInterface;
use App\Models\Viper\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Viper\Project; 
use Storage;

class DocumentService implements DocumentInterface
{
    public function createNewDocument(DocumentDTO $documentDTO, \Illuminate\Http\UploadedFile $file, int $project_id)
    {
        // Verificar si el proyecto existe
        $projectExists = Project::where('bpin', $project_id)->exists();

        if (!$projectExists) {
            return response()->json([
                'error' => 'El proyecto no existe.',
            ], 404);
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

        return response()->json([
            'data' => $document->toArray(),
        ], 201);
    }

    // Función para obtener un nombre de archivo único en una carpeta
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


    public function deleteDocument(int $documentId)
    {
        // Obtener el documento por su ID
        $document = Document::find($documentId);

        if ($document) {
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

        return ['error' => 'Documento no encontrado'];
    }


    public function updateDocument(int $documentId, string $newName)
    {
        // Obtener el documento por su ID
        $document = Document::find($documentId);
    
        if ($document) {
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
    
                return ['error' => 'Error al copiar el archivo con el nuevo nombre'];
            }
    
            return ['error' => 'Documento no encontrado en el sistema de archivos'];
        }
    
        return ['error' => 'Documento no encontrado'];
    }
        
    
    public function getAllDocuments()
    {
        // Obtener todos los documentos de la base de datos
        $documents = Document::all();
        return response()->json([
            'data' => $documents->toArray(),
        ], 200);
    }

    public function getDocumentsByFolder($folderId)
    {
        // Implementa la lógica para obtener documentos por carpeta
        $documents = Document::where('folder_id', $folderId)->get();

        return $documents;
    }

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

    public function listDocumentsInSpaces($folderPath = 'test/')
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
        return response()->json([
            'code' => '404',
            'status' => 'error',
            'message' => 'La carpeta no existe.',
        ], 404);
    }

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
