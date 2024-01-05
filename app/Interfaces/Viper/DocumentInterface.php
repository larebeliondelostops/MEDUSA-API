<?php

namespace App\Interfaces\Viper;

use App\DTOs\Viper\DocumentDTO;

interface DocumentInterface
{
    public function createNewDocument(DocumentDTO $documentDTO, \Illuminate\Http\UploadedFile $file, int $project_id);
    public function getAllDocuments();
    public function listDocumentsInSpaces(string $folderPath);
    public function updateDocument(int $documentId, string $newName);
    public function deleteDocument(int $documentId);
    public function deleteDocumentsByFolder(int $folderId);
}
