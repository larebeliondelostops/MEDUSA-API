<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\DocumentDTO;

interface DocumentInterface
{
    /**
     * Crea un nuevo documento en el sistema Viper.
     *
     * @param DocumentDTO $documentDTO Datos del documento a crear.
     * @param \Illuminate\Http\UploadedFile $file Archivo a cargar.
     * @param int $project_id Identificador del proyecto al que pertenece el documento.
     */
    public function createNewDocument(DocumentDTO $documentDTO, \Illuminate\Http\UploadedFile $file, string $project_id);
    
    /**
     * Obtiene todos los documentos del sistema Viper.
     *
     * @return array Contiene los datos de todos los documentos en el sistema.
     */
    public function getAllDocuments();
    
    /**
     * Lista las URLs de los documentos almacenados en el sistema de archivos "Spaces".
     *
     * @param string $folderPath Ruta de la carpeta en "Spaces".
     * @return array Contiene las URLs de los documentos en la carpeta especificada.
     */
    
     public function listDocumentsInSpaces(string $folderPath);
    /**
     * Actualiza el nombre de un documento en el sistema Viper.
     *
     * @param int $documentId Identificador del documento a actualizar.
     * @param string $newName Nuevo nombre del documento.
     * @return array Contiene un mensaje indicando si el nombre del documento fue actualizado correctamente.
     */
   
    public function updateDocument(int $documentId, string $newName);
    /**
     * Elimina un documento del sistema Viper.
     *
     * @param int $documentId Identificador del documento a eliminar.
     * @return array Contiene un mensaje indicando si el documento fue eliminado correctamente.
     */
    
     public function deleteDocument(int $documentId);
    /**
     * Elimina todos los documentos asociados a una carpeta en el sistema Viper.
     *
     * @param int $folderId Identificador de la carpeta.
     * @return void
     */
    
     public function deleteDocumentsByFolder(int $folderId);
    /**
     * Obtiene documentos por carpeta en el sistema Viper.
     *
     * @param int $folderId Identificador de la carpeta.
     * @return array Contiene los datos de documentos en la carpeta especificada.
     */
    public function getDocumentsByFolder(int $folderId);
}
